@extends('layouts.app')

@section('title', 'Frequently Asked Questions')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">Frequently Asked Questions</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / FAQ
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($faqs->isNotEmpty())
                        <x-faq-accordion :faqs="$faqs" />
                    @else
                        <p class="text-center text-secondary">No FAQs available yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
