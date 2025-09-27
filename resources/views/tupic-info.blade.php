<x-layouts.app>
    <style>
        :root { --brand:#8B2D2D; }
        body { font-family: 'Inter', sans-serif; }

        /* Breadcrumbs */
        .breadcrumb { background: transparent; padding: 0; margin-bottom: 1rem; }
        .breadcrumb-item a{ color: var(--brand); text-decoration:none; font-weight:600; }
        .breadcrumb-item a:hover{ color:#a33a3a; text-decoration:underline; }
        .breadcrumb-item.active{ color:#6b7280; font-weight:600; }

        /* Layout */
        .topic-wrap { max-width: 960px; }
        .topic-header h1 { color: var(--brand); font-weight: 800; letter-spacing:.2px; margin-bottom: .25rem; }
        .topic-meta { color:#6b7280; font-size:.9rem; }

        /* Reading card */
        .topic-card{
            background:#fff;
            border-radius: 1rem;
            box-shadow: 0 10px 28px rgba(0,0,0,.12);
            border:1px solid #f2f2f2;
        }
        .topic-content { line-height: 1.85; color:#1f2937; }
        .topic-content p { margin-bottom: 1rem; }
        .topic-content h2, .topic-content h3 { color:#0f172a; margin-top:1.25rem; font-weight:800; }
        .topic-content ul { padding-left: 1.25rem; }
        .topic-content table { width:100%; border-collapse: collapse; margin: 1rem 0; }
        .topic-content table th, .topic-content table td {
            border:1px solid #e5e7eb; padding:.6rem .75rem; vertical-align:top;
        }
        .topic-content table th { background:#f8fafc; font-weight:700; }

        /* Code blocks */
        pre, code { font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }
        pre {
            background: #0f172a;
            color: #e2e8f0;
            border-radius: .75rem;
            padding: 1rem 1.25rem;
            overflow: auto;
            position: relative;
            margin: 1rem 0;
        }
        .copy-btn {
            position: absolute; top: .6rem; right: .6rem;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.2);
            color: #fff;
            padding: .25rem .6rem;
            border-radius: .5rem;
            font-size: .8rem;
            cursor: pointer;
        }
        .copy-btn:hover { background: rgba(255,255,255,.18); }

        /* Callouts (optional) */
        .callout {
            border-left: 4px solid var(--brand);
            background: #fff6f6;
            border-radius: .5rem;
            padding: .75rem .9rem;
            margin: 1rem 0;
        }

        /* Quiz button */
        .btn-quiz {
            background: linear-gradient(135deg, var(--brand), #742626);
            color: #fff;
            border: none;
            padding: 0.85rem 2rem;
            font-weight: 700;
            border-radius: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(139,45,45,.25);
        }
        .btn-quiz:hover {
            background: linear-gradient(135deg, #a13636, var(--brand));
            transform: translateY(-2px);
            color:#fff;
        }

        /* Disabled look */
        .btn-quiz.disabled, .btn-quiz[aria-disabled="true"] {
            opacity: .75;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Sticky quiz bar on mobile */
        @media (max-width: 576px) {
            .quiz-cta-sticky {
                position: sticky; bottom: 0; background: #fff; padding: .75rem .5rem; 
                border-top:1px solid #eee; display:flex; justify-content:flex-end;
            }
        }
    </style>

    @php
        $topicTitle = $topic_info->title ?? 'Topic';
        $topicContent = $topic_info->content ?? '<p>No content available.</p>';
        $updatedAt = $topic_info->updated_at ?? now();

        // Always show the button. If no quiz yet, disable it.
        $hasQuiz = !empty($quiz?->id);
        $quizUrl = $hasQuiz ? route('quiz.show', $quiz->id) : 'javascript:void(0)';
        $quizAttrs = $hasQuiz ? '' : 'aria-disabled="true"';
    @endphp

    <div class="container py-4 py-md-5 topic-wrap">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/topics">Modules</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $topicTitle }}</li>
            </ol>
        </nav>

        <!-- Title + Meta -->
        <div class="topic-header mb-3">
            <h1 class="h3">{{ $topicTitle }}</h1>
        </div>

        <!-- Content -->
        <article class="topic-card p-4 p-md-5 topic-content">
            {!! $topicContent !!}
        </article>

        <!-- Quiz button (always visible) -->
        <div class="d-none d-sm-flex justify-content-end mt-4">
            <a href="{{ $quizUrl }}" class="btn btn-quiz {{ $hasQuiz ? '' : 'disabled' }}" {!! $quizAttrs !!}>
                Take Quiz →
            </a>
        </div>
        <div class="quiz-cta-sticky d-sm-none mt-3">
            <a href="{{ $quizUrl }}" class="btn btn-quiz w-100 {{ $hasQuiz ? '' : 'disabled' }}" {!! $quizAttrs !!}>
                Take Quiz →
            </a>
        </div>
    </div>

    @push('scripts')
    <script>
        // Add "Copy" buttons to <pre> blocks
        document.querySelectorAll('pre').forEach(pre => {
            const btn = document.createElement('button');
            btn.className = 'copy-btn';
            btn.textContent = 'Copy';
            btn.addEventListener('click', async () => {
                try {
                    await navigator.clipboard.writeText(pre.innerText);
                    btn.textContent = 'Copied!';
                    setTimeout(() => btn.textContent = 'Copy', 1200);
                } catch (e) { console.error(e); }
            });
            pre.appendChild(btn);
        });
    </script>
    @endpush
</x-layouts.app>
