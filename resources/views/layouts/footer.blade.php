<!-- Footer Section Start -->
<footer>
    <div class="footer-top padding-tb pt-0">
        <div class="container">
            <div class="row g-4 row-cols-xl-4 row-cols-md-2 row-cols-1 justify-content-center">
                <div class="col">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>SDIT Lukmanalhakim</h4>
                                </div>
                                <div class="content">
                                    <p>SDIT Lukmanalhakim adalah sekolah dasar Islam terpadu yang menyediakan pendidikan berkualitas dengan nilai-nilai Islam.</p>
                                    <h6>Jam Operasional:</h6>
                                    <ul>
                                        <li>Senin - Jumat: 07.00 - 15.00</li>
                                        <li>Sabtu: 07.00 - 12.00</li>
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
                                    <h4>Menu Utama</h4>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="{{ route('home') }}">Beranda</a></li>
                                        <li><a href="{{ route('visi-misi') }}">Visi & Misi</a></li>
                                        <li><a href="{{ route('guru') }}">Guru</a></li>
                                        <li><a href="{{ route('course') }}">Program</a></li>
                                        <li><a href="{{ route('blog') }}">Berita</a></li>
                                        <li><a href="{{ route('contact') }}">Kontak</a></li>
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
                                    <h4>Kontak Kami</h4>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <i class="icofont-home"></i>
                                            Jl. Contoh No. 123, Kota, Indonesia
                                        </li>
                                        <li>
                                            <i class="icofont-phone"></i>
                                            +62 123 456 789
                                        </li>
                                        <li>
                                            <i class="icofont-envelope"></i>
                                            info@sditlukmanalhakim.sch.id
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
                                    <h4>Sosial Media</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul content-lab">
                                        <li><a href="#" class="icofont-facebook"></a></li>
                                        <li><a href="#" class="icofont-twitter"></a></li>
                                        <li><a href="#" class="icofont-instagram"></a></li>
                                        <li><a href="#" class="icofont-youtube"></a></li>
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
                <p>&copy; {{ date('Y') }} <a href="{{ route('home') }}">SDIT Lukmanalhakim</a>. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section Ending --> 