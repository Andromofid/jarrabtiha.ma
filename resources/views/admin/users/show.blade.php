@extends('admin.layout')

@section('title', 'User Details')

@section('content')
    <div class="grid gap-8 lg:grid-cols-[minmax(0,1.55fr)_minmax(19rem,0.95fr)]">
        <section class="space-y-8">
            <section class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                    <div class="flex gap-4">
                        @php
                            $avatar = $user->avatar ?: null;
                            $avatarUrl = $avatar && str_starts_with($avatar, 'http') ? $avatar : null;
                        @endphp

                        @if ($avatarUrl)
                            <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="h-20 w-20 shrink-0 rounded-full border border-border object-cover">
                        @else
                            <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-full bg-primary-soft text-3xl font-bold text-primary">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif

                        <div class="min-w-0">
                            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">User profile</p>
                            <h2 class="mt-2 text-3xl font-semibold text-brown sm:text-4xl">{{ $user->name }}</h2>
                            <p class="mt-2 break-all text-sm text-brown-soft">{{ $user->email }}</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="{{ $user->email_verified_at ? 'bg-success-soft' : 'bg-danger-soft' }} rounded-full px-3 py-1 text-xs font-semibold text-brown">
                                    {{ $user->email_verified_at ? 'Email verified' : 'Email not verified' }}
                                </span>
                                <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold text-primary">
                                    {{ $user->google_id ? 'Google sign-in' : 'Password sign-in' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-brown transition hover:border-primary/30 hover:text-primary">
                        Back to users
                    </a>
                </div>
            </section>

            <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border border-border bg-white p-5 shadow-soft">
                    <p class="text-sm text-brown-soft">Reviews</p>
                    <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $user->reviews_count }}</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-5 shadow-soft">
                    <p class="text-sm text-brown-soft">Approved reviews</p>
                    <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $approvedReviewsCount }}</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-5 shadow-soft">
                    <p class="text-sm text-brown-soft">Average rating</p>
                    <p class="mt-2 font-display text-4xl font-bold text-primary">{{ number_format($avgRating, 1) }}</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-5 shadow-soft">
                    <p class="text-sm text-brown-soft">Products reviewed</p>
                    <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $productsReviewedCount }}</p>
                </div>
            </section>

            <section class="rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">Reviews</p>
                        <h3 class="mt-2 font-display text-3xl font-bold text-brown">Recent contributions</h3>
                    </div>
                </div>

                @if ($reviews->isEmpty())
                    <div class="mt-6 rounded-[1.75rem] border border-dashed border-border bg-cream px-6 py-12 text-center text-brown-soft">
                        This user has not submitted any reviews yet.
                    </div>
                @else
                    <div class="mt-6 space-y-4">
                        @foreach ($reviews as $review)
                            <article class="rounded-[1.75rem] border border-border bg-cream p-5">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="min-w-0">
                                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                                            {{ $review->product?->brand ?: 'Unknown brand' }}
                                        </p>
                                        <h4 class="mt-1 text-lg font-semibold text-brown">
                                            {{ $review->product?->name ?: 'Deleted product' }}
                                        </h4>
                                        <p class="mt-2 text-sm text-brown-soft">
                                            {{ $review->title ?: 'Untitled review' }}
                                        </p>
                                    </div>

                                    <div class="flex flex-wrap gap-2">
                                        <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-primary">
                                            {{ $review->rating }}/5
                                        </span>
                                        <span class="{{ $review->is_approved ? 'bg-success-soft' : 'bg-danger-soft' }} rounded-full px-3 py-1 text-xs font-semibold text-brown">
                                            {{ $review->is_approved ? 'Approved' : 'Pending' }}
                                        </span>
                                        @if ($review->verified)
                                            <span class="rounded-full bg-primary-soft px-3 py-1 text-xs font-semibold text-primary">
                                                Verified
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <p class="mt-4 text-sm leading-6 text-brown-soft">
                                    {{ $review->body ?: 'No review body provided.' }}
                                </p>

                                <div class="mt-4 grid gap-3 sm:grid-cols-4">
                                    <div class="rounded-2xl border border-border bg-white px-4 py-3">
                                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Likes</p>
                                        <p class="mt-2 text-sm font-semibold text-brown">{{ $review->likes_count }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-border bg-white px-4 py-3">
                                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Recommend</p>
                                        <p class="mt-2 text-sm font-semibold text-brown">{{ $review->would_recommend ? 'Yes' : 'No' }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-border bg-white px-4 py-3">
                                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Skin type</p>
                                        <p class="mt-2 text-sm font-semibold capitalize text-brown">{{ $review->skin_type ?: 'Not set' }}</p>
                                    </div>
                                    <div class="rounded-2xl border border-border bg-white px-4 py-3">
                                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Hair type</p>
                                        <p class="mt-2 text-sm font-semibold capitalize text-brown">{{ $review->hair_type ?: 'Not set' }}</p>
                                    </div>
                                </div>

                                <div class="mt-4 flex flex-wrap gap-4 text-xs font-medium text-brown-light">
                                    <span>Posted {{ $review->created_at->format('M d, Y') }}</span>
                                    <span>Result duration: {{ $review->result_duration_label }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $reviews->links() }}
                    </div>
                @endif
            </section>
        </section>

        <aside class="space-y-6">
            <section class="rounded-card border border-border bg-white p-5 shadow-soft sm:p-6">
                <h3 class="text-xl font-semibold text-brown">Account details</h3>
                <div class="mt-5 space-y-4">
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">City</p>
                        <p class="mt-2 text-sm font-semibold text-brown">{{ $user->city ?: 'Not set' }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Skin type</p>
                        <p class="mt-2 text-sm font-semibold capitalize text-brown">{{ $user->skin_type ?: 'Not set' }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Hair type</p>
                        <p class="mt-2 text-sm font-semibold capitalize text-brown">{{ $user->hair_type ?: 'Not set' }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Joined</p>
                        <p class="mt-2 text-sm font-semibold text-brown">{{ $user->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </section>

            <section class="rounded-card border border-border bg-white p-5 shadow-soft sm:p-6">
                <h3 class="text-xl font-semibold text-brown">Engagement</h3>
                <div class="mt-5 space-y-4">
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Likes given</p>
                        <p class="mt-2 text-sm font-semibold text-brown">{{ $user->review_likes_count }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Recommended reviews</p>
                        <p class="mt-2 text-sm font-semibold text-brown">{{ $recommendedCount }}</p>
                    </div>
                    <div class="rounded-2xl bg-cream px-4 py-3">
                        <p class="text-xs uppercase tracking-[0.18em] text-brown-light">Verification date</p>
                        <p class="mt-2 text-sm font-semibold text-brown">
                            {{ $user->email_verified_at?->format('M d, Y') ?: 'Not verified' }}
                        </p>
                    </div>
                </div>
            </section>
        </aside>
    </div>
@endsection
