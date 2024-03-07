<?php 
require_once 'action.php';

$data = new Book();


?>

<div class="x_panel">
    <!-- Header -->
    <div class="x_title">
        <h2>Data User</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="ml-2">
                <a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- \Header -->

    <!-- Content -->
   

    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Hapus</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php foreach($data->getBookData() as $rows) : ?>
                                <tr>
                                    <td><?= $rows["Judul"] ?? '' ?></td>
                                    <td><?= $rows["Penulis"] ?? '' ?></td>
                                    <td><?= $rows["Penerbit"] ?? '' ?></td>
                                    <td><?= $rows["TahunTerbit"] ?? '' ?></td>
                                    <td><?= $rows["Deskripsi"] ?? '' ?></td>
                                    <td>
                                        <?php
                                            // Memisahkan string kategori menjadi array
                                            $categories = explode(', ', $rows["kategori"] ?? '' );

                                            // Menampilkan setiap kategori dalam satu sel tabel
                                            foreach ($categories as $category) {
                                                echo "<button class='btn btn- btn-sm'>$category</button>" . "<br>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger rounded" href="?page=buku&act=delete&id=<?= $rows["BukuID"] ?>" onclick="return confirm('Hapus <?= $rows['Judul'] ?>?')"><i class="fa fa-trash"></i></a>
                                       
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- \Content -->

</div>