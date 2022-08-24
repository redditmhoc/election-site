@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-8 py-8">
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 justify-between">
            <h1 class="text-4xl font-bold">Constituency results</h1>
            <div class="form-control">
                <div class="input-group">
                    <input type="text" placeholder="Search…" class="input input-primary input-bordered" />
                    <button class="btn btn-square">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-6 mt-6">
            @foreach($groups as $region => $constituencies)
                <div>
                    <div class="my-3">
                        <a id="{{ json_decode($region)->slug }}" href="#{{ json_decode($region)->slug }}" class="text-2xl hover:underline">
                            {{ json_decode($region)->name }}
                        </a>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($constituencies as $constituency)
                            <a href="{{ route('local-constituencies.view', $constituency) }}" class="block">
                                <div class="card bg-base-100 border group">
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            <div class="group-hover:underline">
                                                {{ $constituency->name }}
                                            </div>
                                        </h2>
                                        @if ($constituency->published)
                                        @else
                                            <p>Results not available.</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
