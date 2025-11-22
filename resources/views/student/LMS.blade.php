@extends('layouts.front')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">

        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar position-sticky" style="top: 0; height: calc(100vh - 1rem); overflow-y: auto;">
            <ul class="nav flex-column py-3">
                <li class="nav-item">
                    <a class="nav-link active" href="#dashboard-section" data-section="dashboard-section">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#online-classes-section" data-section="online-classes-section">Online Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lecture-materials-section" data-section="lecture-materials-section">Lecture Materials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#notes-section" data-section="notes-section">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profile-section" data-section="profile-section">Profile</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main id="main-content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="max-height: calc(100vh - 1rem); overflow-y: auto;">

            <!-- Dashboard Section -->
            <section id="dashboard-section" class="mb-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Student Dashboard</h1>
                </div>

                <!-- Announcements -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Announcements</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-center">No any announcements yet</p>
                    </div>
                </div>
            </section>

            <!-- Online Classes Section -->
            <section id="online-classes-section" class="mb-4" style="display: none;">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Joined Classes</h5>
                        <a href="" class="btn btn-sm btn-outline-secondary">All Classes</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(isset($classes) && $classes->count() > 0)
                            @foreach($classes as $class)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $class->name }}</h5>
                                        <p class="card-text text-truncate">{{ Str::limit($class->description, 120) }}</p>
                                        <p class="card-text mt-auto"><small class="text-muted">Instructor: {{ $class->instructor ?? 'TBA' }}</small></p>
                                        <div class="mt-2">
                                            <!-- Replace route name with your actual route -->
                                            <a href="{{$class->link}}" target="_blank" class="btn btn-primary btn-sm">Join Class</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-12">
                                <p>You have not joined any classes yet.</p>
                                <a href="" class="btn btn-sm btn-primary">Browse Classes</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <!-- Lecture Materials Section -->
            <section id="lecture-materials-section" class="mb-4" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lecture Materials</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($materials) && $materials->count() > 0)
                        <ul class="list-group">
                            @foreach($materials as $material)
                            <li class="list-group-item">
                                <strong>{{ $material->name }}</strong>
                                <div class="small text-muted">{{ $material->created_at->format('M d, Y') }}</div>

                                @if($material->slug)
                                <!-- Toggle Video Button -->
                                <button class="btn btn-primary btn-sm mt-2" onclick="toggleVideo(this, '{{ $material->slug }}')">
                                    Watch Video
                                </button>

                                <!-- Video Container -->
                                <div class="mt-2" style="display: none;">
                                    <iframe width="100%" height="400" allow="autoplay" allowfullscreen></iframe>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p>No lecture materials available.</p>
                        @endif
                    </div>
                </div>
            </section>

            <script>
                function toggleVideo(btn, driveLink) {
                    const container = btn.nextElementSibling;
                    const iframe = container.querySelector('iframe');

                    if (container.style.display === 'none') {
                        // Show video
                        const match = driveLink.match(/\/d\/([a-zA-Z0-9_-]+)/);
                        if (match) {
                            const fileId = match[1];
                            iframe.src = `https://drive.google.com/file/d/${fileId}/preview`;
                            container.style.display = 'block';
                            btn.textContent = 'Close Video';
                        } else {
                            alert('Invalid Google Drive link.');
                        }
                    } else {
                        // Hide video
                        container.style.display = 'none';
                        iframe.src = ''; // stop the video
                        btn.textContent = 'Watch Video';
                    }
                }
            </script>


            <!-- Notes Section -->
            <section id="notes-section" class="mb-4" style="display: none;">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Notes</h5>
                        <a href="" class="btn btn-sm btn-primary">Add Note</a>
                    </div>
                    <div class="card-body">
                        @if(isset($notes) && $notes->count() > 0)
                        <div class="list-group">
                            @foreach($notes as $note)
                            <a href="" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ Str::limit($note->title, 80) }}</h6>
                                    <small class="text-muted">{{ $note->created_at->diffForHumans() }}</small>
                                </div>
                                <small class="text-truncate">{{ Str::limit($note->body, 150) }}</small>
                            </a>
                            @endforeach
                        </div>
                        @else
                        <p>No notes yet.</p>
                        @endif
                    </div>
                </div>
            </section>

            <!-- Profile Section -->
            <section id="profile-section" class="mb-4" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($student))
                        <p><strong>Name:</strong> {{ $student->name }}</p>
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                        <p><strong>Enrolled:</strong> {{ $student->created_at->format('M d, Y') }}</p>
                        <a href="{{route('profile.edit')}}" class="btn btn-sm btn-outline-primary">Edit Profile</a>
                        @else
                        <p>Profile information goes here.</p>
                        @endif
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>

<!-- JS to Show Section on Click and support hash navigation -->
<script>
    (function() {
        const links = document.querySelectorAll('#sidebar .nav-link');
        const sections = document.querySelectorAll('main section');
        const mainContent = document.getElementById('main-content');

        function hideAll() {
            sections.forEach(s => s.style.display = 'none');
            links.forEach(l => l.classList.remove('active'));
        }

        function showSection(id) {
            const sec = document.getElementById(id);
            if (!sec) return;
            hideAll();
            sec.style.display = 'block';
            const link = Array.from(links).find(l => l.getAttribute('data-section') === id);
            if (link) link.classList.add('active');
            // Scroll main content to top of that section
            mainContent.scrollTo({
                top: sec.offsetTop - 10,
                behavior: 'smooth'
            });
        }

        // Click handlers
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-section');
                if (!target) return;
                // Update url hash without jumping
                history.replaceState(null, '', '#' + target);
                showSection(target);
            });
        });

        // Show section from hash on load, default to dashboard
        const initial = location.hash ? location.hash.replace('#', '') : 'dashboard-section';
        showSection(initial);

        // Support back/forward navigation with hashchange
        window.addEventListener('hashchange', () => {
            const h = location.hash ? location.hash.replace('#', '') : 'dashboard-section';
            showSection(h);
        });
    })();
</script>

@endsection