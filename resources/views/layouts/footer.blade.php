<!-- Footer Section Start -->
<footer class="style-2 yellow-color-section">
    <div class="footer-top padding-tb">
        <div class="container">
            <div class="row g-4 row-cols-xl-4 row-cols-sm-2 row-cols-1 justify-content-center">
                <div class="col">
                    <div class="footer-item our-address">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <img src="{{ asset('assets/images/logo/01.png') }}" alt="education">
                                </div>
                                <div class="content">
                                    <p>SDIT Luqman Al Hakim Sleman is a leading Islamic elementary school that integrates the national curriculum with Qur'anic values and Islamic character education.<br>We are committed to nurturing a Qur'anic generation—intelligent, noble in character, independent, and ready to face the future.</p>
                                    <ul class="lab-ul office-address">
                                        <li><i class="icofont-google-map"></i>Sleman, Yogyakarta</li>
                                        <li><i class="icofont-phone"></i>+62 857-4725-5761</li>
                                        <li><i class="icofont-envelope"></i>info@luqmanalhakim.sch.id</li>
                                    </ul>
                                    <ul class="lab-ul social-icons">
                                        <li>
                                            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" class="pinterest"><i class="icofont-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>Program</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        <li><a href="{{ route('course') }}">Semua Program</a></li>
                                        <li><a href="#">Tahfidz Al-Qur'an</a></li>
                                        <li><a href="#">Pendidikan Karakter</a></li>
                                        <li><a href="#">Bahasa Arab & Inggris</a></li>
                                        <li><a href="#">Sains & Teknologi</a></li>
                                        <li><a href="#">Kepesantrenan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>Link Cepat</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        <li><a href="{{ route('home') }}">Beranda</a></li>
                                        <li><a href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                                        <li><a href="{{ route('guru') }}">Guru</a></li>
                                        <li><a href="{{ route('blog') }}">Berita</a></li>
                                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                                        <li><a href="#">Galeri</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-item twitter-post">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>Berita Terbaru</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        <li>
                                            <i class="icofont-twitter"></i>
                                            <p>SDIT Luqman Al Hakim <a href="#">@sditlhsleman</a> Pendaftaran Siswa Baru Tahun Ajaran 2025/2026 telah dibuka!</p>
                                        </li>
                                        <li>
                                            <i class="icofont-twitter"></i>
                                            <p>SDIT Luqman Al Hakim <a href="#">@sditlhsleman</a> Selamat kepada siswa-siswi yang telah berhasil menyelesaikan hafalan Juz 30!</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="section-wrapper">
                <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}">SDIT Luqman Al Hakim</a> Designed by <a href="#" target="_blank">TIM IT SDIT Luqman Al Hakim</a> </p>
                <div class="footer-bottom-list">
                    <a href="#">Guru</a>
                    <a href="#">Staff</a>
                    <a href="#">Siswa</a>
                    <a href="#">Alumni</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section Ending --> 