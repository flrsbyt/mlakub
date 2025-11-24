@php
    // Mengambil testimoni yang sudah disetujui (maksimal 5)
    $testimonies = \App\Http\Controllers\KontakController::getApprovedTestimonies(5);
@endphp

<!-- Testimonials -->
<section class="testimonials">
    <div class="container animate-on-scroll">
        <h2>Apa <span>Kata Mereka?</span></h2>
        <div class="testimonial-grid">
            @if($testimonies->count() > 0)
                @foreach($testimonies as $testimoni)
                <div class="testimonial-card animate-on-scroll">
                    <div class="testimonial-avatar">
                        <div class="avatar-ring">
                            <div class="avatar-initial">
                                {{ strtoupper(substr($testimoni->nama, 0, 1)) }}
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimoni->rating)
                                    <i class="fas fa-star star"></i>
                                @else
                                    <i class="fas fa-star star empty"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="testimonial-text">"{{ $testimoni->keterangan }}"</p>
                        <div class="testimonial-info">
                            <h4 class="testimonial-name">{{ $testimoni->nama }}</h4>
                            <span class="testimonial-date">{{ $testimoni->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="no-testimonials">
                    <i class="far fa-comment-dots"></i>
                    <p>Belum ada testimoni yang tersedia. Jadilah yang pertama memberikan testimoni!</p>
                </div>
            @endif
        </div>
        
        @auth
        <div class="text-center mt-5">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testimoniModal">
                <i class="fas fa-pen"></i> Tulis Testimoni Anda
            </button>
        </div>
        @endauth
    </div>
    
    <!-- Modal Testimoni -->
    @auth
    <div class="modal fade" id="testimoniModal" tabindex="-1" role="dialog" aria-labelledby="testimoniModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimoniModalLabel">Tulis Testimoni Anda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kontak.testimoni.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <div class="rating-stars">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }}>
                                    <label for="star{{ $i }}" title="{{ $i }} bintang">
                                        <i class="fas fa-star"></i>
                                    </label>
                                @endfor
                            </div>
                            @error('rating')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Testimoni Anda</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="4" required>{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endauth
</section>

@push('styles')
<style>
    /* Testimonials Section */
    .testimonials {
        padding: 80px 0;
        background-color: #f9f9f9;
        position: relative;
        overflow: hidden;
    }

    .testimonials h2 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 50px;
        color: #333;
        position: relative;
        display: inline-block;
        left: 50%;
        transform: translateX(-50%);
    }

    .testimonials h2 span {
        color: #FF6B35;
    }

    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .testimonial-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .testimonial-avatar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .avatar-ring {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF6B35, #F7931E);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px;
    }

    .avatar-initial {
        width: 100%;
        height: 100%;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .testimonial-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .testimonial-rating {
        color: #FFD700;
        margin-bottom: 15px;
        font-size: 1rem;
    }

    .testimonial-rating .star {
        margin-right: 3px;
    }

    .testimonial-rating .empty {
        color: #e0e0e0;
    }

    .testimonial-text {
        font-style: italic;
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .testimonial-info {
        margin-top: auto;
    }

    .testimonial-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .testimonial-date {
        font-size: 0.85rem;
        color: #888;
    }

    .no-testimonials {
        grid-column: 1 / -1;
        text-align: center;
        padding: 50px 20px;
        color: #888;
    }

    .no-testimonials i {
        font-size: 3rem;
        margin-bottom: 20px;
        display: block;
        color: #e0e0e0;
    }

    .no-testimonials p {
        font-size: 1.1rem;
    }

    /* Button Style */
    .btn-primary {
        display: inline-block;
        background: linear-gradient(135deg, #FF6B35, #F7931E);
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(255, 107, 53, 0.4);
    }

    .btn-primary i {
        margin-right: 8px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .testimonial-grid {
            grid-template-columns: 1fr;
            padding: 0 15px;
        }

        .testimonials h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .testimonial-card {
            padding: 25px 20px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Animasi untuk testimonial card
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk mengecek elemen yang terlihat di viewport
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Fungsi untuk menangani scroll dan animasi
        function handleScroll() {
            const cards = document.querySelectorAll('.testimonial-card');
            cards.forEach(card => {
                if (isElementInViewport(card)) {
                    card.classList.add('animate-on-scroll-visible');
                }
            });
        }

        // Tambahkan event listener untuk scroll
        window.addEventListener('scroll', handleScroll);
        
        // Panggil sekali saat halaman dimuat
        handleScroll();

        // Inisialisasi rating stars untuk form testimoni
        const stars = document.querySelectorAll('.rating-stars input');
        if (stars.length > 0) {
            stars.forEach(star => {
                star.addEventListener('change', function() {
                    const rating = this.value;
                    // Update tampilan bintang yang aktif
                    stars.forEach((s, index) => {
                        if (index < rating) {
                            s.nextElementSibling.classList.add('active');
                        } else {
                            s.nextElementSibling.classList.remove('active');
                        }
                    });
                });
            });
        }

        // Handle form submission
        const testimoniForm = document.querySelector('#testimoniModal form');
        if (testimoniForm) {
            testimoniForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validasi form
                const rating = document.querySelector('input[name="rating"]:checked');
                const keterangan = document.querySelector('textarea[name="keterangan"]');
                
                if (!rating) {
                    alert('Mohon berikan rating');
                    return false;
                }
                
                if (!keterangan.value.trim()) {
                    alert('Mohon isi testimoni Anda');
                    keterangan.focus();
                    return false;
                }
                
                // Submit form
                this.submit();
            });
        }
    });
</script>
@endpush
