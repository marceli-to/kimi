  <!-- Modal -->
  <div
    x-dialog
    x-model="hasModal"
    style="display: none"
    class="fixed inset-0 overflow-y-auto z-10"
  >
    <!-- Overlay -->
    <div x-dialog:overlay x-transition.opacity class="fixed inset-0 bg-primary-100/75"></div>

    <!-- Panel -->
    <div class="relative min-h-screen flex items-center justify-center p-4">
      <div
        x-dialog:panel
        x-transition.in x-transition.out.opacity
        class="relative max-w-2xl w-full bg-white rounded-lg shadow shadow-primary-200 overflow-y-auto"
      >
          <!-- Close Button -->
          <div class="absolute top-0 right-0 pt-16 pr-16">
            <button type="button" @click="$dialog.close()" class="bg-white rounded-md p-8 text-primary-500 shadow shadow-primary-200 hover:text-primary-600 hover:shadow-primary-300 hover:bg-primary-50 transition">
              <span class="sr-only">Close modal</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="size-16" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>

          <!-- Panel -->
          <div class="p-24">
            {{ $slot }}
          </div>
      </div>
    </div>
  </div>