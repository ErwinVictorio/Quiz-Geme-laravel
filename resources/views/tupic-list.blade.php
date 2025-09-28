<x-layouts.app>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .breadcrumb { background: transparent; padding: 0; margin-bottom: 2rem; }
        .breadcrumb-item a { text-decoration: none; color: #8B2D2D; font-weight: 500; transition: 0.2s ease; }
        .breadcrumb-item a:hover { color: #a63a3a; text-decoration: underline; }
        .breadcrumb-item.active { color: #6b7280; font-weight: 600; }
        .topic-card { background: #fff; color: #1e293b; border-radius: 1rem; box-shadow: 0 8px 20px rgba(0,0,0,0.15); padding: 2rem; }
        .topic-card h5 { font-weight: 700; margin-bottom: 1rem; color: #8B2D2D; }
        .topic-list li { padding: 0.6rem 0; border-bottom: 1px solid #f1f1f1; transition: all 0.2s ease; }
        .topic-list li:last-child { border-bottom: none; }
        .topic-list li a { text-decoration: none; color: #374151; display: flex; align-items: center; gap: 0.5rem; font-size: 0.95rem; transition: 0.2s ease; }
        .topic-list li a:hover { color: #8B2D2D; font-weight: 600; transform: translateX(6px); }
        .section-title { font-size: 1.1rem; font-weight: 700; margin-top: 1.5rem; margin-bottom: 0.5rem; color: #8B2D2D; }
        .topic-list li i { color: #8B2D2D; }
    </style>

    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">OOP Topics</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h2 class="fw-bold text-center mb-4" style="color:#8B2D2D;">📘 List of Topics</h2>


        <!-- Cards per Module -->
        @foreach ($grouped as $category => $topics)
            <div class="topic-card mx-auto mb-4" style="max-width: 700px;">
                <h5>
                    @if($category === 'Module 1') 🔑 Basic OOP (Classes, Objects & Fields) @endif
                    @if($category === 'Module 2') 🛠️ Methods & Constructors @endif
                    @if($category === 'Module 3') 🧬 Inheritance & Polymorphism @endif
                </h5>

                <ul class="list-unstyled topic-list">
                    @foreach ($topics as $topic)
                        <li>
                            <a href="{{ route('viewTopic_info', $topic->id) }}">
                                <i class="bi bi-chevron-right"></i> {{ $topic->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-layouts.app>
