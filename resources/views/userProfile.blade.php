{{-- resources/views/profile/edit.blade.php --}}
<x-layouts.app>
<style>
    :root{
        --brand:#8B2D2D; --brand-600:#a13636;
        --bg:#0f172a; --bg-2:#1e293b;
        --ink:#0b1220; --muted:#6b7280;
        --card:#ffffff; --line:#e6e8ec; --input:#f5f6f8;
        --shadow:0 10px 30px rgba(0,0,0,.18);
        --shadow-lg:0 24px 80px rgba(0,0,0,.22);
    }

    /* Page shell */
    .hero{min-height:180px;background:linear-gradient(135deg,var(--bg),var(--bg-2));}
    .wrap{max-width:1100px;margin:-70px auto 56px;padding:0 20px;}

    /* Breadcrumb */
    .crumbs{display:flex;align-items:center;gap:10px;margin-bottom:16px;opacity:.95}
    .crumbs a{color:var(--brand);text-decoration:none;font-weight:700}
    .crumbs a:hover{color:var(--brand-600);text-decoration:underline}
    .crumbs .sep{color:#a3acb8}
    .crumbs .current{color:#8c96a6;font-weight:600}

    /* Layout */
    .grid{display:grid;grid-template-columns:360px minmax(0,1fr);gap:24px;align-items:start}
    @media (max-width:980px){.grid{grid-template-columns:1fr}}

    /* Cards */
    .card{background:var(--card);border-radius:16px;box-shadow:var(--shadow);overflow:hidden;border:1px solid rgba(15,23,42,.04)}
    .card .head{padding:14px 18px;border-bottom:1px solid var(--line);font-weight:800;color:#111827;background:linear-gradient(180deg,#fff, #fafbfc)}
    .card .body{padding:18px}

    /* Player Card */
    .row{display:flex;gap:16px;align-items:center}
    .avatar{width:112px;height:112px;border-radius:999px;overflow:hidden;border:5px solid #fff;box-shadow:0 8px 26px rgba(0,0,0,.18);position:relative;background:#e5e7eb}
    .avatar img{width:100%;height:100%;object-fit:cover}
    .cam{position:absolute;right:-6px;bottom:-6px;width:38px;height:38px;border-radius:12px;border:3px solid #fff;background:var(--brand);color:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 6px 16px rgba(139,45,45,.35)}
    .meta h2{margin:8px 0 4px;font-size:20px;line-height:1.1;color:#0f172a}
    .meta .handle{color:#7a8698}
    .muted{color:var(--muted);font-size:12px}

    .statgrid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:16px}
    .stat{background:var(--input);border-radius:12px;padding:14px;text-align:center;border:1px solid rgba(15,23,42,.04)}
    .stat .v{font-weight:900;font-size:18px}
    .stat .k{color:var(--muted);font-size:12px}

    /* Emphasized score chip */
    .score{display:inline-flex;flex-direction:column;justify-content:center;align-items:center;
           width:78px;height:78px;border-radius:16px;background:#fff;border:1px solid #efeff2;
           box-shadow:0 10px 22px rgba(0,0,0,.08)}
    .score .n{font-weight:900;font-size:22px;color:#111827}
    .score .l{font-size:12px;color:#8a91a1}

    /* Form */
    .formgrid{display:grid;grid-template-columns:1fr;gap:14px}
    @media (min-width:1024px){.formgrid{grid-template-columns:1fr 1fr}}
    .formrow{display:flex;flex-direction:column;gap:8px}
    .formrow label{font-size:12px;color:#6b7280;font-weight:600}
    .input,.select{background:var(--input);border:1px solid #e8eaee;border-radius:12px;padding:12px 14px;font-size:14px;outline:none;transition:border .15s, box-shadow .15s}
    .input:focus,.select:focus{border-color:var(--brand);background:#fff;box-shadow:0 0 0 4px rgba(139,45,45,.12)}

    .actions{display:flex;gap:12px;justify-content:flex-end;margin-top:16px;border-top:1px solid var(--line);padding-top:16px}
    .btn{border:0;border-radius:12px;padding:12px 16px;cursor:pointer;font-weight:800}
    .btn-light{background:#f3f4f6;color:#111827}
    .btn-brand{background:linear-gradient(180deg,var(--brand),#7d2424);color:#fff;box-shadow:0 10px 24px rgba(139,45,45,.35)}
    .btn-brand:hover{background:linear-gradient(180deg,var(--brand-600),#8b2d2d)}

    /* Alerts */
    .alert{margin:0 0 16px;padding:10px 14px;border-radius:12px}
    .alert-success{background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0}
    .alert-error{background:#fef2f2;color:#991b1b;border:1px solid #fecaca}
</style>

<div class="hero"></div>

<div class="wrap">
    {{-- Breadcrumb --}}
    <nav class="crumbs" aria-label="Breadcrumb">
        <a href="{{ url('/') }}">Home</a>
        <span class="sep">/</span>
        <a href="{{ route('topics.view') }}">Modules</a>
        <span class="sep">/</span>
        <span class="current">Profile</span>
    </nav>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <div class="grid">
        {{-- LEFT: Player card --}}
        <div class="card" style="box-shadow:var(--shadow-lg)">
            <div class="head">Player Card</div>
            <div class="body">
                <form id="avatarForm" action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input id="avatarInput" type="file" name="avatar" accept="image/*" hidden>
                    <div class="row">
                        <div class="avatar" title="Change avatar">
                            <img id="avatarPreview" src="{{ $avatarUrl }}" alt="Avatar">
                            <button class="cam" type="button" onclick="document.getElementById('avatarInput').click()">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 7h3l2-2h6l2 2h3v12H4V7z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="13" r="4" stroke="white" stroke-width="2"/>
                                </svg>
                            </button>
                        </div>
                        <div class="meta">
                            <h2>{{ $user->name }}</h2>
                            <div class="handle">{{ $user->email }}</div>
                            <div class="muted" style="margin-top:6px;">Click camera to update</div>
                        </div>
                    </div>
                </form>

                <div style="margin-top:18px;display:flex;gap:12px;align-items:center">
                    <div class="score">
                        <div class="n">{{ $user->score ?? 0 }}</div>
                        <div class="l">Score</div>
                    </div>
                    <div class="muted">Your total score across quizzes.</div>
                </div>
            </div>
        </div>

        {{-- RIGHT: Edit form --}}
        <div class="card">
            <div class="head">Edit Profile</div>
            <div class="body">
                <form action="{{ route('profile.update') }}" method="POST" novalidate>
                    @csrf
                    <div class="formgrid">
                        <div class="formrow">
                            <label>Full name</label>
                            <input class="input" type="text" name="name" value="{{ old('name',$user->name) }}" placeholder="Full name">
                        </div>
                        <div class="formrow">
                            <label>Email</label>
                            <input class="input" type="email" name="email" value="{{ old('email',$user->email) }}" placeholder="you@example.com">
                        </div>
                    </div>

                    <div class="actions">
                        <button type="button" class="btn btn-light" onclick="history.back()">Cancel</button>
                        <button type="submit" class="btn btn-brand">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('avatarInput');
    const img   = document.getElementById('avatarPreview');
    const form  = document.getElementById('avatarForm');
    input?.addEventListener('change', (e) => {
        const file = e.target.files?.[0];
        if (file) { img.src = URL.createObjectURL(file); form.submit(); }
    });
});
</script>
</x-layouts.app>
