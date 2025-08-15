import os, json, pickle
from dotenv import load_dotenv
from sqlalchemy import create_engine, text
from sklearn.feature_extraction.text import TfidfVectorizer

load_dotenv()

DB_HOST = os.getenv("DB_HOST", "127.0.0.1")
DB_PORT = os.getenv("DB_PORT", "3306")
DB_NAME = os.getenv("DB_NAME", "chatbot")
DB_USER = os.getenv("DB_USER", "root")
DB_PASS = os.getenv("DB_PASS", "secret")
MODEL_PATH = os.getenv("MODEL_PATH", "./model.pkl")

engine = create_engine(
    f"mysql+pymysql://{DB_USER}:{DB_PASS}@{DB_HOST}:{DB_PORT}/{DB_NAME}?charset=utf8mb4"
)

def load_corpus():
    with engine.connect() as conn:
        faq = conn.execute(
            text("SELECT question, answer FROM faq_entries")
        ).mappings().all()

        products = conn.execute(
            text("SELECT name, description, price FROM products")
        ).mappings().all()

        settings_rows = conn.execute(
            text("SELECT facebook, position, linkedin, instagram, phone FROM settings")
        ).mappings().all()

    questions, answers = [], []

    # FAQs
    for row in faq:
        q = (row.get('question') or '').strip()
        a = (row.get('answer') or '').strip()
        if q and a:
            questions.append(q)
            answers.append(a)

    # Settings
    kv = dict(settings_rows[0]) if settings_rows else {}
    for k in list(kv.keys()):
        kv[k] = '' if kv[k] is None else str(kv[k]).strip()

    if kv.get('position'):
        questions += [
            "Où êtes-vous situés ?",
            "Quelle est votre adresse ?",
            "Emplacement du magasin ?"
        ]
        answers += [kv['position']] * 3

    if kv.get('phone'):
        questions += [
            "Quel est votre numéro de téléphone ?",
            "Comment vous contacter par téléphone ?",
            "Téléphone du magasin ?"
        ]
        answers += [kv['phone']] * 3

    if kv.get('facebook'):
        questions += ["Quel est votre Facebook ?", "Page Facebook ?"]
        answers += [kv['facebook'], kv['facebook']]
    if kv.get('instagram'):
        questions += ["Quel est votre Instagram ?", "Compte Instagram ?"]
        answers += [kv['instagram'], kv['instagram']]
    if kv.get('linkedin'):
        questions += ["Avez-vous un LinkedIn ?", "Lien LinkedIn ?"]
        answers += [kv['linkedin'], kv['linkedin']]

    # Products
    if products:
        prod_names = [p.get('name') for p in products if (p.get('name') or '').strip()]
        if prod_names:
            prod_list = ", ".join(prod_names)
            questions += ["Quels produits proposez-vous ?", "Que vendez-vous ?"]
            answers += [f"Nous proposons: {prod_list}.", f"Catalogue: {prod_list}."]

        for p in products:
            name = (p.get('name') or '').strip()
            desc = (p.get('description') or '').strip()
            price = p.get('price')
            if not name:
                continue
            base_answer_parts = [name]
            if desc:
                base_answer_parts.append(desc)
            if price is not None:
                base_answer_parts.append(f"Prix: {price} MAD")
            base_answer = " — ".join(base_answer_parts)

            questions += [
                f"Avez-vous {name} ?",
                f"Prix de {name} ?",
            ]
            answers += [
                base_answer,
                f"{name} — Prix: {price} MAD" if price is not None else base_answer
            ]

    return questions, answers

if __name__ == "__main__":
    try:
        qs, asw = load_corpus()
        if not qs:
            raise RuntimeError("Corpus vide. Seed la base d'abord.")

        vectorizer = TfidfVectorizer(
            lowercase=True,
            analyzer="char_wb",
            ngram_range=(3, 5)
        )
        X = vectorizer.fit_transform(qs)

        model = {
            "vectorizer": vectorizer,
            "X": X,
            "answers": asw,
            "questions": qs
        }
        
        with open(MODEL_PATH, 'wb') as f:
            pickle.dump(model, f, protocol=pickle.HIGHEST_PROTOCOL)
            
        print(json.dumps({"ok": True, "questions": len(qs)}, ensure_ascii=False))
        
    except Exception as e:
        print(json.dumps({"ok": False, "error": f"Training error: {str(e)}"}, ensure_ascii=False))