<x-app-layout>
<section class="relative bg-gray-50 py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 uppercase tracking-widest">À propos</h2>
            <div class="w-24 h-1 bg-primary mx-auto my-4"></div>
            <p class="text-sm text-gray-600 uppercase">Notre concept, notre histoire et notre équipe</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 space-y-6 text-justify text-gray-700 leading-relaxed">
                <p>
                    <strong>Artificial & Business Intelligence (ABIsoft)</strong> est une entreprise produisant des logiciels et site/application web en se basant sur les technologies actuelles les plus avancées, qui combinent en même temps des outils caractérisant plusieurs domaines, en particulier celles de l'intelligence artificielle (AI), l'informatique décisionnelle (BI), le web design, le traitement et l'analyse des données masseuses, la recherche opérationnelle et tout ce qui est en relation avec le graphisme.
                </p>
                <p>
                    Notre principal objectif est de créer des produits intelligents améliorant et facilitant les tâches exécutées chaque jour dans la vie professionnelle, accomplir des services clientèles raisonnables et faisables touchant bien évidemment les domaines qui nous intéressent. De plus, nous organisons des formations professionnelles aux gens qui sont intéressés à maîtriser et à poursuivre un processus d'apprentissage afin d'acquérir les capacités nécessaires à l'exercice d'un métier ou d'une activité professionnelle.
                </p>
                <p>
                    On dispose d'une équipe professionnelle et des experts dans les différents domaines (des ingénieurs en développement informatique, BigData analytique, Web Design, recherche opérationnelle, intelligence artificielle, etc.). Des professeurs universitaires et des docteurs interviennent également selon les domaines de notre intérêt.
                </p>
            </div>
            <div class="space-y-6">
                <img src="{{ asset('storage/about/about-1.webp') }}" alt="AI" class="rounded-xl shadow-lg w-full object-cover aspect-video">
                <img src="{{ asset('storage/about/about-2.jpeg') }}" alt="Teamwork" class="rounded-xl shadow-lg w-full object-cover aspect-video">
            </div>
        </div>
    </div>
</section>
</x-app-layout>
