<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../resources/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <!-- HEADER -->
            <div class="container-fluid bottom-bar h-auto" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-3 py-1">
                    <div class="d-flex align-items-center">
                        <div style="width: 50px;">
                            <img src="../../resources\icons\poltek-logoo.png" class="img-fluid" alt="logo-uni">
                        </div>
                        <div class="text-head-primary" style="padding-left: 1rem; width: 11rem;">
                            POLITEKNIK NEGERI MALANG
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div style="width: 50px;">
                            <img src="../../resources\icons\a279b488c581b0ecf88b189fddfc16ab.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- FORM -->
            <form action="industri_action.php" method="POST">
                <input type="hidden" name="role" value="industri">
                <div class="container-fluid d-flex flex-row">
                    <div class="container-fluid d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center align-items-center" style="margin: 0;">
                            <p class="text-primary">
                                Silahkan mengisi sesuai dengan data diri Anda untuk Daftar
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center" style="width: 30%;">
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="text" name="nama" placeholder="Nama">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <select class="form-control" name="role" required>
                                    <option value="" selected disabled>Pilih Peran</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="tendik">Tenaga Pendidik</option>
                                    <option value="alumni">Alumni</option>
                                    <option value="industri">Industri</option>
                                    <option value="ortu">Orang Tua</option>
                                </select>
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="text" name="notelp" placeholder="Nomor Telepon">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="text" name="perusahaan" placeholder="Perusahaan">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="text" name="jabatan" placeholder="Jabatan">
                            </div>
                            <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                                <input class="form-control" type="text" name="kota" placeholder="Kota">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn-primary" value="SUBMIT" style="position: fixed; bottom: 1rem; right: 3rem;">
                </div>
            </form>
            <!-- FORM END -->
            <!--
                FORM NAMES :
                    - role
                    - username
                    - password
                    - nama
                    - notelp
                    - email
                    - perusahaan
                    - jabatan
                    - kota
            -->
        </div>
    </body>
</html>