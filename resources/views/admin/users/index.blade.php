@extends('admin.layout')

@section('title', 'Manage Users')

@section('content')
    <section class="mb-8 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-ink-soft">Total users</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $totalUsers }}</p>
        </div>
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-ink-soft">Verified users</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $verifiedUsers }}</p>
        </div>
        <div class="rounded-2xl border border-border bg-white p-6 shadow-soft">
            <p class="text-sm text-ink-soft">Users with reviews</p>
            <p class="mt-2 font-display text-4xl font-bold text-primary">{{ $reviewersCount }}</p>
        </div>
    </section>

    <section class="mb-8 rounded-card border border-border bg-white p-6 shadow-soft sm:p-8">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-primary">Users</p>
                <h2 class="mt-2 font-display text-4xl font-bold text-ink">Browse user activity</h2>
                <p class="mt-3 max-w-2xl text-sm text-ink-soft sm:text-base">
                    See profile details, account status, contribution volume, and jump into each user’s reviews.
                </p>
            </div>
        </div>

        <form action="{{ route('admin.users.index') }}" method="GET" class="mt-8 rounded-[1.75rem] border border-border bg-cream p-5 sm:p-6">
            <div class="grid gap-4 lg:grid-cols-3">
                <div>
                    <label for="search" class="mb-2 block text-sm font-semibold text-ink">Search</label>
                    <input
                        id="search"
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Name, email, or city"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-ink placeholder:text-ink-light focus:border-primary focus:ring-0">
                </div>

                <div>
                    <label for="verified" class="mb-2 block text-sm font-semibold text-ink">Verification</label>
                    <select
                        id="verified"
                        name="verified"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-ink focus:border-primary focus:ring-0">
                        <option value="">All users</option>
                        <option value="verified" @selected($verified === 'verified')>Verified</option>
                        <option value="unverified" @selected($verified === 'unverified')>Unverified</option>
                    </select>
                </div>

                <div>
                    <label for="provider" class="mb-2 block text-sm font-semibold text-ink">Sign-in method</label>
                    <select
                        id="provider"
                        name="provider"
                        class="w-full rounded-2xl border border-border bg-white px-4 py-3 text-sm text-ink focus:border-primary focus:ring-0">
                        <option value="">All methods</option>
                        <option value="google" @selected($provider === 'google')>Google</option>
                        <option value="password" @selected($provider === 'password')>Email and password</option>
                    </select>
                </div>
            </div>

            <div class="mt-5 flex flex-wrap gap-3">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-pill bg-primary px-5 py-3 text-sm font-bold text-white transition hover:bg-primary-hover">
                    Apply filters
                </button>
                <a
                    href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-ink transition hover:border-primary/30 hover:text-primary">
                    Reset
                </a>
            </div>
        </form>
    </section>

    @if ($users->isEmpty())
        <section class="rounded-[2rem] border border-dashed border-border bg-white px-8 py-16 text-center shadow-soft">
            <h3 class="font-display text-3xl font-bold text-ink">No users match these filters</h3>
            <p class="mx-auto mt-3 max-w-xl text-ink-soft">
                Try a broader search or remove a filter to see more accounts.
            </p>
        </section>
    @else
        <section class="grid gap-5 lg:grid-cols-2">
            @foreach ($users as $user)
                <article class="overflow-hidden rounded-card border border-border bg-white shadow-soft transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-card">
                    <div class="flex flex-col gap-5 p-5 sm:p-6">
                        <div class="flex gap-4">
                            @php
                                $avatar = $user->avatar ?: null;
                                $avatarUrl = $avatar && str_starts_with($avatar, 'http') ? $avatar : null;
                            @endphp

                            @if ($avatarUrl)
                                <img src="{{ $avatarUrl }}" alt="{{ $user->name }}" class="h-16 w-16 shrink-0 rounded-full border border-border object-cover">
                            @else
                                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-primary-soft text-xl font-bold text-primary">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <h3 class="truncate text-xl font-semibold text-ink">{{ $user->name }}</h3>
                                        <p class="mt-1 truncate text-sm text-ink-soft">{{ $user->email }}</p>
                                        <p class="mt-2 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                                            {{ $user->google_id ? 'Google account' : 'Password account' }}
                                        </p>
                                    </div>

                                    <span class="{{ $user->email_verified_at ? 'bg-success-soft' : 'bg-danger-soft' }} rounded-full px-3 py-1 text-xs font-semibold text-ink">
                                        {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Reviews</p>
                                <p class="mt-2 text-sm font-semibold text-ink">{{ $user->reviews_count }}</p>
                            </div>
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Average rating</p>
                                <p class="mt-2 text-sm font-semibold text-ink">{{ number_format($user->reviews_avg_rating ?? 0, 1) }}/5</p>
                            </div>
                            <div class="rounded-2xl bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Likes given</p>
                                <p class="mt-2 text-sm font-semibold text-ink">{{ $user->review_likes_count }}</p>
                            </div>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-3">
                            <div class="rounded-2xl border border-border bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-light">City</p>
                                <p class="mt-2 text-sm font-semibold text-ink">{{ $user->city ?: 'Not set' }}</p>
                            </div>
                            <div class="rounded-2xl border border-border bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Skin type</p>
                                <p class="mt-2 text-sm font-semibold capitalize text-ink">{{ $user->skin_type ?: 'Not set' }}</p>
                            </div>
                            <div class="rounded-2xl border border-border bg-cream px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-light">Hair type</p>
                                <p class="mt-2 text-sm font-semibold capitalize text-ink">{{ $user->hair_type ?: 'Not set' }}</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3 border-t border-border pt-4">
                            <a
                                href="{{ route('admin.users.show', $user) }}"
                                class="inline-flex items-center justify-center rounded-pill border border-border bg-white px-5 py-3 text-sm font-semibold text-ink transition hover:border-primary/30 hover:text-primary">
                                View profile and reviews
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>

        <div class="mt-8">
            {{ $users->links() }}
        </div>
    @endif
@endsection
