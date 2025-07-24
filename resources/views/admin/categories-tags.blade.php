<script>
    function categoryManager() {
      return {
        showModal: false,
        isEdit: false,
        isSubmitting: false,
        modalTitle: '',
        modalName: '',
        modalType: '',
        modalId: null,
        modalAction: '',

        openCreateModal(type) {
          this.isEdit = false;
          this.modalTitle = `Ajouter une catégorie (${type})`;
          this.modalName = '';
          this.modalType = type;
          this.modalAction = '{{ route('admin.categories.store') }}';
          this.showModal = true;
        },

        openEditModal(type, id, name) {
          this.isEdit = true;
          this.modalTitle = `Modifier une catégorie (${type})`;
          this.modalName = name;
          this.modalType = type;
          this.modalId = id;
          this.modalAction = `{{ url('admin/categories') }}/${type}/${id}`;
          this.showModal = true;
        },

        closeModal() {
          this.showModal = false;
          this.modalName = '';
          this.modalId = null;
          this.modalType = '';
          this.isSubmitting = false;
        },

        submitForm(event) {
          this.isSubmitting = true;
          const form = event.target;
          
          // Add a slight delay to show the loading state
          setTimeout(() => {
            form.submit();
          }, 300);
        }
      };
    }
  </script><x-admin-layout>
  <div x-data="categoryManager()" class="space-y-8 p-6">

    {{-- Product Categories --}}
    <div class="card bg-base-100 shadow-lg border border-base-200">
      <div class="card-body">
        <div class="flex justify-between items-center mb-6">
          <h2 class="card-title text-2xl text-primary flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            Catégories de Produits
          </h2>
          <button @click="openCreateModal('product')" class="btn btn-primary btn-sm gap-2 shadow-md hover:shadow-lg transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajouter Catégorie
          </button>
        </div>

        <div class="space-y-2">
          @foreach($categoryProducts as $item)
            <div class="flex justify-between items-center p-4 bg-base-50 rounded-lg border border-base-200 hover:bg-base-100 hover:shadow-md transition-all duration-200">
              <span class="font-medium text-base-content">{{ $item->name }}</span>
              <div class="flex gap-2">
                <button @click="openEditModal('product', {{ $item->id }}, '{{ $item->name }}')" class="btn btn-sm btn-warning gap-1 hover:scale-105 transition-transform duration-200">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  Modifier
                </button>
                <form method="POST" action="{{ route('admin.categories.destroy', ['type' => 'product', 'id' => $item->id]) }}" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-error gap-1 hover:scale-105 transition-transform duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Supprimer
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Service Categories --}}
    <div class="card bg-base-100 shadow-lg border border-base-200">
      <div class="card-body">
        <div class="flex justify-between items-center mb-6">
          <h2 class="card-title text-2xl text-secondary flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Catégories de Services
          </h2>
          <button @click="openCreateModal('service')" class="btn btn-primary btn-sm gap-2 shadow-md hover:shadow-lg transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajouter Catégorie
          </button>
        </div>

        <div class="space-y-2">
          @foreach($categoryServices as $item)
            <div class="flex justify-between items-center p-4 bg-base-50 rounded-lg border border-base-200 hover:bg-base-100 hover:shadow-md transition-all duration-200">
              <span class="font-medium text-base-content">{{ $item->name }}</span>
              <div class="flex gap-2">
                <button @click="openEditModal('service', {{ $item->id }}, '{{ $item->name }}')" class="btn btn-sm btn-warning gap-1 hover:scale-105 transition-transform duration-200">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  Modifier
                </button>
                <form method="POST" action="{{ route('admin.categories.destroy', ['type' => 'service', 'id' => $item->id]) }}" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-error gap-1 hover:scale-105 transition-transform duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Supprimer
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Formation Categories --}}
    <div class="card bg-base-100 shadow-lg border border-base-200">
      <div class="card-body">
        <div class="flex justify-between items-center mb-6">
          <h2 class="card-title text-2xl text-accent flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            Catégories de Formations
          </h2>
          <button @click="openCreateModal('formation')" class="btn btn-primary btn-sm gap-2 shadow-md hover:shadow-lg transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajouter Catégorie
          </button>
        </div>

        <div class="space-y-2">
          @foreach($categoryFormations as $item)
            <div class="flex justify-between items-center p-4 bg-base-50 rounded-lg border border-base-200 hover:bg-base-100 hover:shadow-md transition-all duration-200">
              <span class="font-medium text-base-content">{{ $item->name }}</span>
              <div class="flex gap-2">
                <button @click="openEditModal('formation', {{ $item->id }}, '{{ $item->name }}')" class="btn btn-sm btn-warning gap-1 hover:scale-105 transition-transform duration-200">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  Modifier
                </button>
                <form method="POST" action="{{ route('admin.categories.destroy', ['type' => 'formation', 'id' => $item->id]) }}" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-error gap-1 hover:scale-105 transition-transform duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Supprimer
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Blog Tags --}}
    <div class="card bg-base-100 shadow-lg border border-base-200">
      <div class="card-body">
        <div class="flex justify-between items-center mb-6">
          <h2 class="card-title text-2xl text-info flex items-center gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Tags d'Articles
          </h2>
          <button @click="openCreateModal('blogtag')" class="btn btn-primary btn-sm gap-2 shadow-md hover:shadow-lg transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajouter Tag
          </button>
        </div>

        <div class="space-y-2">
          @foreach($blogTags as $item)
            <div class="flex justify-between items-center p-4 bg-base-50 rounded-lg border border-base-200 hover:bg-base-100 hover:shadow-md transition-all duration-200">
              <span class="font-medium text-base-content">{{ $item->name }}</span>
              <div class="flex gap-2">
                <button @click="openEditModal('blogtag', {{ $item->id }}, '{{ $item->name }}')" class="btn btn-sm btn-warning gap-1 hover:scale-105 transition-transform duration-200">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  Modifier
                </button>
                <form method="POST" action="{{ route('admin.categories.destroy', ['type' => 'blogtag', 'id' => $item->id]) }}" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-error gap-1 hover:scale-105 transition-transform duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Supprimer
                  </button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>


    {{-- Modal --}}
    <div 
  x-show="showModal" 
  class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50"
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-200"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
>
  <div 
    class="bg-white rounded-2xl shadow-2xl w-11/12 max-w-md p-6 border border-gray-200" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    @click.away="closeModal()"
  >
    <div class="flex items-center gap-3 mb-5">
      <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-gray-800" x-text="modalTitle"></h3>
    </div>

    <form :action="modalAction" method="POST" @submit.prevent="submitForm" class="space-y-5">
      <template x-if="isEdit">
        <input type="hidden" name="_method" value="PUT" />
      </template>
      @csrf
      <input type="hidden" name="type" :value="modalType" />

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie</label>
        <input 
          type="text" 
          name="name" 
          x-model="modalName" 
          required 
          class="input input-bordered w-full rounded-md focus:ring-2 focus:ring-primary focus:outline-none transition-all duration-200" 
          placeholder="Entrez le nom de la catégorie..." 
        />
      </div>

      <div class="flex justify-end items-center gap-3 pt-4">
        <button type="button" @click="closeModal()" class="btn btn-ghost text-gray-600 hover:text-red-500">
          <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
          Annuler
        </button>

        <button 
          type="submit" 
          class="btn btn-primary gap-2 px-5 py-2 rounded-md" 
          :class="{'loading': isSubmitting}"
        >
          <svg x-show="!isSubmitting" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
          <span x-text="isEdit ? 'Modifier' : 'Ajouter'"></span>
        </button>
      </div>
    </form>
  </div>
</div>

  </div>

  <script>
    function categoryManager() {
      return {
        showModal: false,
        isEdit: false,
        isSubmitting: false,
        modalTitle: '',
        modalName: '',
        modalType: '',
        modalId: null,
        modalAction: '',

        openCreateModal(type) {
          this.isEdit = false;
          this.modalTitle = `Ajouter une catégorie (${type})`;
          this.modalName = '';
          this.modalType = type;
          this.modalAction = '{{ route('admin.categories.store') }}';
          this.showModal = true;
        },

        openEditModal(type, id, name) {
          this.isEdit = true;
          this.modalTitle = `Modifier une catégorie (${type})`;
          this.modalName = name;
          this.modalType = type;
          this.modalId = id;
          this.modalAction = `{{ url('admin/categories') }}/${type}/${id}`;
          this.showModal = true;
        },

        closeModal() {
          this.showModal = false;
          this.modalName = '';
          this.modalId = null;
          this.modalType = '';
          this.isSubmitting = false;
        },

        submitForm(event) {
          this.isSubmitting = true;
          const form = event.target;
          
          // Add a slight delay to show the loading state
          setTimeout(() => {
            form.submit();
          }, 300);
        }
      };
    }
  </script>
</x-admin-layout>