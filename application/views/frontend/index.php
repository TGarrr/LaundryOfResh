<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #072541;">
    <div class="container">
        <a style="font-size: 30px" class="page-scroll oleo-font navbar-brand font-weight-bold" href="#home">OFRESH Laundry</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-center">

                <a class="text-light nav-item nav-link page-scroll" href="#paket">Jenis Paket</a>
                <a class="text-light nav-item nav-link page-scroll" href="#testimoni">Testimoni</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link px-3 py-2 btn btn-primary rounded-pill text-white" href="<?= base_url('auth/cekStatusPesanan'); ?>"><i class="fas fa-fw fa-check"></i> Cek Status Pesanan</a>
            </div>
        </div>
    </div>
</nav>

<!-- Intro -->
<section class="pt-5" id="home">
    <div class="jumbotron jumbotron-fluid bg-info">
        <div class="container text-white text-center">
            <img style="box-shadow: 5px 5px 5px rgba(0,0,0,0.3)" src="<?= base_url('assets/'); ?>img/logo.jpg" alt="logo" class="img-fluid rounded mb-2" width="200" data-aos="flip-up" data-aos-duration="1000">
            <h1 class="text-shadow display-4 oleo-font font-weight-bold" data-aos="fade-up" data-aos-duration="1000">OFResh Laundry</h1>

            <h4 class="text-shadow my-3" data-aos="fade-up" data-aos-duration="1000">Mencuci dengan <span class="font-weight-bold">Cepat</span> dan menjaga pakaian tetap <span class="font-weight-bold">Berkualitas.</span></h4>
            <h5 class="text-shadow my-2" data-aos="fade-up" data-aos-duration="1000">Namanya juga hidup pasti banyak <span class="font-weight-bold">Cobaan</span>, kalo banyak <span class="font-weight-bold">Cucian</span> bawa aja ke <span class="font-weight-bold oleo-font">OFRESH Laundry.</span></h5>
            <a href="#testimoni" class="page-scroll px-3 py-2 btn btn-primary rounded-pill my-5" data-aos="fade-up" data-aos-duration="1000">Testimoni</a>
        </div>
    </div>
</section>

<!-- Jenis Paket -->
<section id="paket" class="testimoni  mt-n5 p-5" style="background-color: #072541;">
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <div class="row">
            <div class="col-lg my-4 mb-5 text-white text-center font-weight-bold">
                <h2>JENIS PAKET</h2>
            </div>
        </div>
        <div class="row pb-5 mb-5">
            <table class="table table-bordered">
                <thead style="background-color: red;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;">
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section id="testimoni" class="testimoni bg-info mt-n5 p-5" style="background-color: #89CFF3;">
    <div class="container">
        <div class="row">
            <div class="col-lg my-4 mb-5 text-white text-center">
                <h2 class="font-weight-bold">Testimoni</h2>
            </div>
        </div>
        <div class="row" data-aos="fade-right" data-aos-duration="1000">
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/'); ?>img/gambar1.png" class="card-img" alt="img testimoni">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cepat & Bersih</h5>
                                <p class="card-text">Waktu pencucian hanya 1 hari untuk pakaian 10 kg. Meskipun cepat, tetapi tetap bersih.</p>
                                <p class="card-text"><small class="text-muted">Rafi Al Zaitun</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-left" data-aos-duration="1000">
            <div class="col-lg-6 offset-lg-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/'); ?>img/gambar3.png" class="card-img" alt="img testimoni">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Tepat waktu</h5>
                                <p class="card-text">Tanggal selesai dicuci sangat cepat dan konsisten dengan aplikasi.</p>
                                <p class="card-text"><small class="text-muted">Abi Aqsal</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-right" data-aos-duration="1000">
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/'); ?>img/pas.png" class="card-img" alt="img testimoni">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Pelayanan yang handal</h5>
                                <p class="card-text">Pakaian yang berbahan katun tidak rusak meskipun di cuci di Laundry</p>
                                <p class="card-text"><small class="text-muted">Umi Widya</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>