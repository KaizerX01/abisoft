import sys, os, json, pickle
from dotenv import load_dotenv
import io

# Force UTF-8 output
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

load_dotenv()
MODEL_PATH = os.getenv("MODEL_PATH", "./model.pkl")

def main():
    if len(sys.argv) < 2:
        print(json.dumps({"ok": False, "error": "Usage: chatbot.py \"question\""}))
        return
   
    question = sys.argv[1].strip()
   
    if not os.path.exists(MODEL_PATH):
        print(json.dumps({
            "ok": True, 
            "answer": "Bonjour! Le modèle n'est pas encore entraîné. Veuillez contacter l'administrateur pour entraîner le chatbot.",
            "score": 0.0
        }, ensure_ascii=False))
        return
   
    try:
        from sklearn.metrics.pairwise import cosine_similarity
        
        with open(MODEL_PATH, 'rb') as f:
            model = pickle.load(f)
           
        vec = model["vectorizer"].transform([question])
        sims = cosine_similarity(vec, model["X"])[0]
        idx = sims.argmax()
        score = float(sims[idx])
       
        THRESHOLD = 0.25
        if score >= THRESHOLD:
            answer = model["answers"][idx]
        else:
            answer = ("Désolé, je n'ai pas bien compris votre demande. "
                      "Pouvez-vous reformuler ? Vous pouvez aussi demander nos horaires, l'adresse ou les produits disponibles.")
       
        print(json.dumps({"ok": True, "answer": answer, "score": score}, ensure_ascii=False))
       
    except Exception as e:
        import traceback
        error_details = traceback.format_exc()
        print(json.dumps({"ok": False, "error": f"Error: {str(e)}", "details": error_details}, ensure_ascii=False))

if __name__ == "__main__":
    main()