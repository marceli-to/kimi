@php
if (! isset($scrollTo)) {
  $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
  ? <<<JS
    (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
  JS
  : '';
@endphp

<div>
  @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
      <div class="flex justify-between flex-1 sm:hidden">
        <span>
          @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-14 py-10 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-none rounded-md select-none">
              {!! __('pagination.previous') !!}
            </span>
          @else
            <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-16 py-10 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-none rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
              {!! __('pagination.previous') !!}
            </button>
          @endif
        </span>
        <span>
          @if ($paginator->hasMorePages())
            <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="relative inline-flex items-center px-16 py-10 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-none rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
              {!! __('pagination.next') !!}
            </button>
          @else
            <span class="relative inline-flex items-center px-16 py-10 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-none rounded-md select-none">
              {!! __('pagination.next') !!}
            </span>
          @endif
        </span>
      </div>
      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
          <p class="text-sm text-gray-600 leading-none">
            <span>{!! __('Showing') !!}</span>
            <span class="font-bold">{{ $paginator->firstItem() }}</span>
            <span>{!! __('to') !!}</span>
            <span class="font-bold">{{ $paginator->lastItem() }}</span>
            <span>{!! __('of') !!}</span>
            <span class="font-bold">{{ $paginator->total() }}</span>
            <span>{!! __('results') !!}</span>
          </p>
        </div>
        <div>
          <span class="relative z-0 inline-flex gap-x-12">
            <span>
              {{-- Previous Page Link --}}
              @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}" class="hidden">
                  <span class="relative inline-flex items-center justify-center size-32 text-sm font-medium text-primary-100 cursor-default leading-none" aria-hidden="true">
                    <svg class="size-24" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </span>
              @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="relative inline-flex items-center justify-center size-32 text-sm font-bold text-primary-300 leading-none hover:text-primary-900 focus:z-10 focus:outline-none transition ease-in-out duration-150 hidden" aria-label="{{ __('pagination.previous') }}">
                  <svg class="size-24" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                </button>
              @endif
            </span>
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                <span aria-disabled="true">
                  <span class="relative inline-flex items-center justify-center size-32 text-sm font-bold text-primary-300 cursor-default leading-none select-none">{{ $element }}</span>
                </span>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                @foreach ($element as $page => $url)
                  <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                    @if ($page == $paginator->currentPage())
                      <span aria-current="page">
                        <span class="relative inline-flex items-center justify-center size-32 text-sm font-bold text-primary-600 shadow shadow-primary-300 bg-primary-50 rounded-md cursor-default leading-none select-none">{{ $page }}</span>
                      </span>
                    @else
                      <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="relative inline-flex items-center justify-center size-32 text-sm font-bold text-primary-300 leading-none shadow shadow-primary-200 hover:shadow-primary-300 rounded-md focus:z-10 focus:outline-none transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                        {{ $page }}
                      </button>
                    @endif
                  </span>
                @endforeach
              @endif
            @endforeach
            <span>
              {{-- Next Page Link --}}
              @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="relative inline-flex items-center justify-center size-32 text-sm font-medium text-primary-300 leading-none hover:text-primary-900 focus:z-10 focus:outline-none transition ease-in-out duration-150 hidden" aria-label="{{ __('pagination.next') }}">
                  <svg class="size-24" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
                </button>
              @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="hidden">
                  <span class="relative inline-flex items-center justify-center size-32 text-sm font-medium text-primary-200 cursor-default leading-none" aria-hidden="true">
                    <svg class="size-24" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                </span>
              @endif
            </span>
          </span>
        </div>
      </div>
    </nav>
  @endif
</div>
