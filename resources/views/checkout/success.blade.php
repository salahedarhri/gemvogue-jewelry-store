<!-- resources/views/payment-success.blade.php -->

@extends('layouts.client') <!-- Use your base layout if you have one -->

@section('content')
    <div class="flex items-center justify-center h-screen bg-third font-dmsans">
        <div class="bg-white p-8 rounded shadow-md max-w-md">
            <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
            </svg>

            <h2 class="mt-6 text-center text-2xl font-extrabold text-gray-900">
                Payment Successful!
            </h2>


            <div class="mt-6">
                <a href="{{ route('boutique') }}"
                    class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-green active:bg-green-800">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
@endsection
