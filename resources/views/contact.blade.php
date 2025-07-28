<x-app-layout>
  <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-12">

      {{-- Embedded Google Map --}}
      <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-200 transform hover:scale-[1.01] transition-transform duration-300">
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent z-10"></div>
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.2821310469453!2d-4.9991889999999986!3d34.0366333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b8ef54c6eb7%3A0x3ae8d823bd8ed51f!2sCabinet%20ABIsoft!5e0!3m2!1sfr!2sma!4v1753717368471!5m2!1sfr!2sma" 
          width="100%" 
          height="500" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade"
          class="w-full h-[500px] object-cover">
        </iframe>
        <div class="absolute bottom-4 left-4 z-20 text-white">
          <h3 class="text-2xl font-bold">Notre Emplacement</h3>
          <p class="text-sm">{{ $settings->position }}</p>
        </div>
      </div>

      {{-- Contact Section --}}
      <div class="bg-white rounded-3xl shadow-2xl p-8 sm:p-12 lg:p-16">
        <div class="flex flex-col lg:flex-row gap-12">

          {{-- Contact Form --}}
          <div class="flex-1 space-y-8">
            <div>
              <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Contactez-Nous</h2>
              <p class="mt-2 text-gray-600 text-lg">Nous sommes là pour vous aider ! Envoyez-nous un message, et nous vous répondrons rapidement.</p>
            </div>

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
              @csrf

              @if(session('success'))
                <div class="alert alert-success bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-sm">
                  {{ session('success') }}
                </div>
              @endif

              <div>
                <input type="text" name="name" placeholder="Votre Nom"
                  class="input input-bordered w-full input-lg bg-gray-50 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-primary focus:border-primary transition-colors" required>
              </div>

              <div>
                <input type="email" name="email" placeholder="Votre Email"
                  class="input input-bordered w-full input-lg bg-gray-50 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-primary focus:border-primary transition-colors" required>
              </div>

              <div>
                <textarea name="message" placeholder="Votre Message"
                  class="textarea textarea-bordered w-full h-40 bg-gray-50 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary w-full btn-lg shadow-md hover:bg-primary-dark hover:scale-105 transition-all duration-300">
                Envoyer le Message
              </button>
            </form>
          </div>

          {{-- Contact Info --}}
          <div class="flex-1 space-y-10">
            <div class="space-y-6">
              <h3 class="text-3xl font-semibold text-gray-900 flex items-center gap-3">
                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 5h12M9 3v2m6 6H3m6-2v2m3 8h6a2 2 0 002-2V7a2 2 0 00-2-2h-6a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                Informations de Contact
              </h3>
              <div class="text-gray-700 space-y-3 text-lg">
                <p><strong>Téléphone :</strong> {{ $settings->phone }}</p>
                <p><strong>Emplacement :</strong> {{ $settings->position }}</p>
              </div>
            </div>

            <div class="space-y-4">
              <h4 class="text-xl font-semibold text-gray-900">Restez Connecté</h4>
              <div class="flex gap-4 flex-wrap">
                <a href="{{ $settings->facebook }}" target="_blank"
                  class="btn btn-outline btn-sm text-blue-600 border-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                  Facebook
                </a>
                <a href="{{ $settings->linkedin }}" target="_blank"
                  class="btn btn-outline btn-sm text-blue-500 border-blue-500 hover:bg-blue-500 hover:text-white transition-colors">
                  LinkedIn
                </a>
                <a href="{{ $settings->instagram }}" target="_blank"
                  class="btn btn-outline btn-sm text-pink-500 border-pink-500 hover:bg-pink-500 hover:text-white transition-colors">
                  Instagram
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</x-app-layout>