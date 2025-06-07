@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold mb-6">Dashboard</h1>
                
                @if($farmer)
                    <div class="mb-8">
                        <h2 class="text-xl font-medium mb-2">Your Farm: {{ $farmer->farm_name }}</h2>
                        <p>Type: {{ $farmer->farm_type }}</p>
                        <p>Location: {{ $farmer->address }}</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-medium mb-4">Recent Activities</h2>
                        @forelse($activities as $activity)
                            <div class="mb-4 p-4 border rounded-lg">
                                <h3 class="font-medium">{{ $activity->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $activity->activity_type }}</p>
                                <p class="text-sm">Status: {{ $activity->status }}</p>
                            </div>
                        @empty
                            <p>No activities yet.</p>
                        @endforelse
                    </div>
                @else
                    <div class="alert alert-info">
                        <a href="{{ route('farmers.create') }}" class="text-blue-600 hover:underline">
                            Complete your farmer profile
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection