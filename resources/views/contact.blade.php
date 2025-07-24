<x-app-layout>
  <div class="min-h-screen bg-gray-100 py-16 px-6">
    <div class="max-w-6xl mx-auto">
      <div class="bg-white rounded-2xl shadow-md p-10 md:p-16">
        <div class="flex flex-col md:flex-row gap-12">

          {{-- Contact Form --}}
          <div class="flex-1 space-y-6">
            <h2 class="text-4xl font-bold text-gray-800">Get in Touch</h2>
            <p class="text-gray-500 text-lg">We’d love to hear from you! Fill in the form below.</p>

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-5">
              @csrf

              @if(session('success'))
                <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded-lg shadow-sm">
                  {{ session('success') }}
                </div>
              @endif

              <input type="text" name="name" placeholder="Your Name"
                class="input input-bordered w-full input-lg bg-white text-gray-800" required>

              <input type="email" name="email" placeholder="Your Email"
                class="input input-bordered w-full input-lg bg-white text-gray-800" required>

              <textarea name="message" placeholder="Your Message"
                class="textarea textarea-bordered w-full h-32 bg-white text-gray-800" required></textarea>

              <button type="submit" class="btn btn-primary w-full btn-lg shadow-md">Send Message</button>
            </form>
          </div>

          {{-- Contact Info --}}
          <div class="flex-1 space-y-6">
            <div class="space-y-3">
              <h3 class="text-2xl font-semibold text-gray-700">Contact Info</h3>
              <p class="text-gray-600"><strong>Phone:</strong> {{ $settings->phone }}</p>
              <p class="text-gray-600"><strong>Location:</strong> {{ $settings->position }}</p>
            </div>

            <div class="space-y-2">
              <h4 class="text-lg font-semibold text-gray-700">Follow us</h4>
              <div class="flex gap-5 items-center">
                <a href="{{ $settings->facebook }}" target="_blank" class="btn btn-outline btn-sm text-blue-600 border-blue-600 hover:bg-blue-600 hover:text-white">Facebook</a>
                <a href="{{ $settings->linkedin }}" target="_blank" class="btn btn-outline btn-sm text-blue-500 border-blue-500 hover:bg-blue-500 hover:text-white">LinkedIn</a>
                <a href="{{ $settings->instagram }}" target="_blank" class="btn btn-outline btn-sm text-pink-500 border-pink-500 hover:bg-pink-500 hover:text-white">Instagram</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
