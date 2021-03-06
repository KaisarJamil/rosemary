@extends('layouts.backend.app')
@section('title', 'Sub Categories')

@section('content')

    <div class="flex flex-col px-6 py-8 w-full">
        <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="bg-white rounded-md shadow px-6 flex space-x-4">
                    <li class="flex">
                        <div class="flex items-center">
                        <a href="{{ route('app.dashboard') }}" class="text-gray-400 hover:text-gray-500">
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                        </div>
                    </li>

                    <li class="flex">
                        <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ $category->name}}</a>
                        </div>
                    </li>
                </ol>
            </nav>

    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
           
        <div class="mx-5">
          {{-- Alert message --}}
          @if(session()->has('success'))
              @include('layouts.backend.alerts.alert-success')
          @endif
          {{-- End alert message --}}

          {{-- Errors Message --}}
          @if ($errors->any())
              @include('layouts.backend.alerts.alert-danger')
          @endif
          {{-- End error message --}}
        </div>

            <!-- Sub Category info -->
        <div class="w-full flex items-end justify-between p-6 space-x-6">
            <div class="flex-2 truncate">
                <div class="flex items-center space-x-3">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Sub Category Information
                    </h3>
                </div>
                
                <form action="#" method="get" role="search">
                    <input type="text" name="search" id="email" class="mt-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Search Here"/>
                </form>

                <!-- @livewire('sub-category-search') -->
            </div>
            <a href="{{ route('app.sub.categories.create', $category->id)}}" type="button" class="inline-flex items-center px-4 py-2 mt-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
                Add New Sub Category
            </a>
        </div>

      <!-- Sub Category info End -->
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Serial
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            Sub-Category Name
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
            Parent Category
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
             Slug
            </th>
            <th scope="col" class="px-20 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        @foreach ($sub_categories as $key => $sub_category)
          <tbody>
            <tr class="bg-white">
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $key + 1 }}
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="px-4 py-2 rounded-lg" href="#">{{ $sub_category->name }}</a>
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="px-4 py-2 rounded-lg">{{$sub_category->category->name}}</a>
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="px-4 py-2 rounded-lg">{{$sub_category->slug}}</a>
                </td>

                <td class="ml-2 px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                  <a href="{{ route('app.sub.categories.edit', [$category->id,$sub_category->id])}}" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <form action="{{route('app.sub.categories.delete', $sub_category->id)}}" method="POST" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:text-sm">
                    @method('DELETE')
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                        </svg>
                    </button>               
                  </form>
                </td>
            </tr>
          </tbody>
        @endforeach
      </table>
      
    <div class="px-6 py-5">
      <span>{{ $sub_categories->links() }}</span>
    </div>
    
</div>

@endsection