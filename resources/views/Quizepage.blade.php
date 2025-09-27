<x-layouts.app>
    <style>
        :root {
            --brand: #8B2D2D;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .quiz-wrap {
            max-width: 960px;
        }

        .quiz-head h1 {
            color: var(--brand);
            font-weight: 800;
        }

        .quiz-meta {
            color: #6b7280;
        }

        /* Question card */
        .question-card {
            border: 1px solid #f1f1f1;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        }

        .question-num {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fff0f0;
            color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin-right: .6rem;
        }

        /* Choice grid */
        .choice-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: .6rem;
        }

        @media (min-width: 576px) {
            .choice-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Choice tile (custom radio) */
        .choice-tile {
            position: relative;
            border: 1px solid #e5e7eb;
            border-radius: .75rem;
            padding: .85rem 1rem .85rem 2.8rem;
            cursor: pointer;
            transition: .2s ease;
            background: #fff;
            user-select: none;
            display: block;
            min-height: 54px;
        }

        .choice-tile:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, .06);
        }

        .choice-tile .letter {
            position: absolute;
            left: .9rem;
            top: 50%;
            transform: translateY(-50%);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #64748b;
            background: #fff;
            transition: .2s ease;
        }

        /* Hide the native radio but keep accessible */
        .choice-radio {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        /* Checked styles */
        .choice-radio:checked+label.choice-tile {
            border-color: var(--brand);
            background: #fff7f7;
            box-shadow: 0 10px 20px rgba(139, 45, 45, .12);
        }

        .choice-radio:checked+label.choice-tile .letter {
            border-color: var(--brand);
            background: var(--brand);
            color: #fff;
        }

        /* Focus ring for keyboard users */
        .choice-radio:focus+label.choice-tile {
            outline: 3px solid rgba(139, 45, 45, .25);
            outline-offset: 2px;
        }

        /* Sticky submit on mobile */
        .submit-bar {
            position: sticky;
            bottom: 0;
            background: #fff;
            border-top: 1px solid #eee;
            padding: .75rem;
            display: flex;
            gap: .75rem;
            justify-content: flex-end;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--brand), #742626);
            color: #fff;
            border: none;
            border-radius: 2rem;
            padding: .75rem 1.5rem;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(139, 45, 45, .25);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #a13636, var(--brand));
            color: #fff;
            transform: translateY(-1px);
        }
    </style>

    <div class="container py-4 py-md-5 quiz-wrap">

        {{-- BREADCRUMB --}}
        <nav class="bc mb-3" aria-label="breadcrumb">
            <ol class="bc-list">
                <li class="bc-item">
                    <a href="{{ route('home.view') }}">Home</a>
                </li>

                <li class="bc-item">
                    <a href="{{ url('/topics') }}">Modules</a>
                </li>

                <li class="bc-item active" aria-current="page">
                    {{ $topic->title ?? 'Introduction to C# OOP' }}
                </li>
            </ol>
        </nav>

        <style>
            :root {
                --brand: #8B2D2D;
                --muted: #6b7280;
            }

            .bc {
                font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            }

            .bc-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                align-items: center;
                gap: .75rem;
                font-size: 1.05rem;
            }

            .bc-item {
                display: flex;
                align-items: center;
                gap: .75rem;
            }

            /* the slash separator */
            .bc-item+.bc-item::before {
                content: "/";
                color: #c4c4c4;
                font-weight: 500;
            }

            /* links look like your sample */
            .bc a {
                color: var(--brand);
                text-decoration: none;
                font-weight: 700;
                /* bold links */
            }

            .bc a:hover {
                color: #a33a3a;
                text-decoration: underline;
            }

            /* current/active */
            .bc .active {
                color: var(--muted);
                font-weight: 700;
                /* bold but muted color, like the image */
            }
        </style>

        {{-- Start form (adjust action as needed) --}}
        <form method="POST" action="{{ route('quiz.submit', $quiz->id ?? 0) }}">
            @csrf

            @foreach ($questions as $q)
            <div class="card question-card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="question-num">{{ $loop->iteration }}</div>
                        <h6 class="mb-0">{{ $q->text }}</h6>
                        @if(!empty($q->points))
                        <span class="badge bg-light text-dark border ms-2">{{ $q->points }} pt</span>
                        @endif
                    </div>

                    @php
                    // Normalize choices to ['A'=>'...', 'B'=>'...']
                    $choices = is_array($q->choices) ? $q->choices : json_decode($q->choices, true);
                    if ($choices && array_keys($choices) === range(0, count($choices)-1)) {
                    $letters = range('A', 'Z');
                    $choices = collect($choices)->mapWithKeys(fn($v,$i)=>[$letters[$i]=>$v])->toArray();
                    }
                    $oldVal = old("answers.$q->id");
                    @endphp

                    <div class="choice-grid mt-3">
                        @foreach ($choices as $letter => $text)
                        @php $id = "q{$q->id}_{$letter}"; @endphp
                        <input class="choice-radio" type="radio" name="answers[{{ $q->id }}]" id="{{ $id }}"
                            value="{{ $letter }}" @checked($oldVal===$letter) required>
                        <label class="choice-tile" for="{{ $id }}">
                            <span class="letter">{{ $letter }}</span>
                            <span class="choice-text">{{ $text }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Submit --}}
            <div class="submit-bar mt-3">
                <button type="submit" class="btn btn-submit">
                    Submit Answers
                </button>
            </div>


        </form>
    </div>
</x-layouts.app>