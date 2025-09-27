<x-layouts.app>
    <style>
        :root { --brand:#8B2D2D; }
        body { font-family: 'Inter', sans-serif; }
        .wrap { max-width: 1100px; }

        /* Header */
        .lb-title { color: var(--brand); font-weight: 900; letter-spacing:.2px; }
        .lb-sub   { color:#6b7280; }

        /* Podium */
        .podium { display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); }
        @media (max-width: 768px){ .podium{ grid-template-columns:1fr; } }

        .podium-card{
            border-radius: 1rem; border:1px solid #f0f0f0;
            background:#fff; box-shadow:0 14px 30px rgba(0,0,0,.08);
        }
        .podium-rank{
            width:44px;height:44px;border-radius:50%;
            display:flex;align-items:center;justify-content:center;
            color:#fff;font-weight:800;margin:0 auto .5rem;
        }
        .rank-1{ background:linear-gradient(135deg,#d4af37,#bd9730); }
        .rank-2{ background:linear-gradient(135deg,#c0c0c0,#a9a9a9); }
        .rank-3{ background:linear-gradient(135deg,#cd7f32,#b86f2b); }

        .avatar{ width:64px;height:64px;border-radius:50%;overflow:hidden;border:3px solid rgba(139,45,45,.25); }
        .avatar img{ width:100%;height:100%;object-fit:cover; }
        .score-badge{
            background:#fff1f1;border:1px solid #ffdede;color:var(--brand);
            padding:.25rem .6rem;border-radius:999px;font-weight:700;font-size:.9rem;
        }

        /* Cards & tables */
        .cardish{ border-radius:1rem;border:1px solid #f0f0f0;background:#fff;box-shadow:0 10px 22px rgba(0,0,0,.06); }
        .table thead th{ border-bottom:1px solid #eee;color:#6b7280;font-weight:700; }
        .table tbody tr:hover{ background:#fff8f8; }
        .rank-pill{ min-width:44px;text-align:center;border-radius:999px;background:#f3f4f6;font-weight:700; }
        .me{ background:#fff3f3 !important; }

        /* Progress */
        .bar{ height:8px;background:#f3f4f6;border-radius:999px;overflow:hidden; }
        .bar > span{ display:block;height:100%;background:linear-gradient(90deg,var(--brand),#a33a3a); }

        .section-title{ color:#0f172a;font-weight:800; }
        .badge-user{ background:#eef2ff;color:#3730a3; }
    </style>

    <div class="container wrap py-4 py-md-5">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h3 lb-title mb-1">Leaderboard</h1>
            <div class="lb-sub">Top learners by best quiz scores</div>
        </div>

        @php
            $top  = $leaders->take(3);
            $rest = $leaders->slice(3);
            $meId = auth()->id() ?? 0;

            $maxScore = max(1, (int)($leaders->max('score') ?? 1)); // for progress bar width
        @endphp

        {{-- Podium --}}
        <div class="podium mb-4">
            @forelse ($top as $i => $u)
                @php
                    $rank = $i + 1;
                    $rankClass = $rank === 1 ? 'rank-1' : ($rank === 2 ? 'rank-2' : 'rank-3');
                    $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($u->name ?? 'User') . "&background=8B2D2D&color=fff";
                    $pct = round(($u->score / $maxScore) * 100);
                @endphp
                <div class="podium-card p-3 p-md-4 text-center">
                    <div class="podium-rank {{ $rankClass }}">{{ $rank }}</div>
                    <div class="avatar mx-auto mb-2"><img src="{{ $avatarUrl }}" alt="avatar"></div>
                    <div class="fw-bold">{{ $u->name ?? 'User' }}</div>
                    <div class="mt-2"><span class="score-badge">{{ number_format($u->score) }} pts</span></div>
                    <div class="bar mt-3"><span style="width: {{ $pct }}%"></span></div>
                </div>
            @empty
                <div class="alert alert-light w-100 mb-0 text-center">No scores yet.</div>
            @endforelse
        </div>

        {{-- Overall table --}}
        <div class="cardish mb-5">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Rank</th>
                            <th>Name</th>
                            <th class="text-end" style="width: 140px;">Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rank = 1; @endphp
                        @forelse ($leaders as $u)
                            @php
                                $rowClass = $u->id == $meId ? 'me' : '';
                                $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($u->name ?? 'User') . "&background=8B2D2D&color=fff";
                                $pct = round(($u->score / $maxScore) * 100);
                            @endphp
                            <tr class="{{ $rowClass }}">
                                <td><span class="rank-pill px-3 py-1 d-inline-block">{{ $rank }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $avatarUrl }}" class="rounded-circle" width="36" height="36" alt="avatar">
                                        <div class="fw-semibold">{{ $u->name ?? 'User' }}</div>
                                    </div>
                                    <div class="bar mt-2"><span style="width: {{ $pct }}%"></span></div>
                                </td>
                                <td class="text-end fw-bold">{{ number_format($u->score) }}</td>
                            </tr>
                            @php $rank++; @endphp
                        @empty
                            <tr><td colspan="3" class="text-center text-muted py-4">No scores yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Per-topic scores --}}
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="h5 section-title mb-0">Per-topic scores</h2>
            @if(request('user'))
                <span class="badge badge-user rounded-pill px-3 py-2">
                    Showing {{ request('user') == $meId ? 'your' : "user #".request('user') }} topic scores
                </span>
            @endif
        </div>

        @forelse ($byUser as $userId => $rows)
            @php
                $name = $rows->first()->name ?? "User #$userId";
            @endphp
            <div class="cardish mb-4">
                <div class="px-3 pt-3 pb-0"><strong>{{ $name }}</strong></div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th class="text-end" style="width: 160px;">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $r)
                                <tr>
                                    <td>{{ $r->topic }}</td>
                                    <td class="text-end fw-semibold">{{ number_format($r->score) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="alert alert-light">No per-topic scores yet.</div>
        @endforelse

        <div class="d-flex justify-content-end mt-3">
            <a href="{{route('topics.view')}}" class="btn btn-outline-secondary rounded-pill">← Back to Home</a>
        </div>
    </div>
</x-layouts.app>
