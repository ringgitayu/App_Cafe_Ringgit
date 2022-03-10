<?= $this->extend('layout/admin')?>
<?= $this->section('content')?>
<?php
    if (session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade show"role="alert">
<?= session()->getFlashdata('success')?>
<button type="button" class="close" data-dismiss="alert" aria-label="close">close</button>
</div>
<?php
    }
?>
<button  class="btn btn-primary" data-toggle="modal" data-target="#addUser">Tambah User</button>
<table class="table table-stripped table-hover">
    <thead>
        <th>No</th>
        <th>nama</th>
        <th>username</th>
        <th>jenis kelamin</th>
        <th>jenis</th>
        
    <thead>
    <tbody>    
        <?php
        $no =1;
        foreach($data as $row):

        ?>
        <tr>
        <td><?=$no?></td>
        <td><?= $row['nama']?></td> 
        <td><?= $row['username']?></td>
        <td><?= $row['jenis_kelamin']?></td>
        <td><?= $row['jenis']?></td>
            
        <td>
            <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editUser-<?=$row['id']?>">Edit</button> 
            <a href="<?= base_url ('user/delete/'.$row['id'])?> " onclick="return confirm ('yakin mau hapus?') " class="btn btn-danger btn-sm btn-delete">Delete</a> 
        </td>
        </tr>
<div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="example" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example">Edit User</h5>   
                <button class="close" data-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?= base_url('user/edit/'.$row['id'])?>" method="post">
             <div class="modal-body">
                <div class="form-group">
                   <label for="nama">Nama</label>
                   <input type="text"  name="nama" class="form-control" id="nama" placeholder="inputkan nama" value="<?= $row ['nama'] ?>">
                </div> 
                
                <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text"  name="username" class="form-control" id="username" placeholder="inputkan username" value="<?= $row ['username'] ?>">
                </div> 

                <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password"  name="password" class="form-control" id="password" placeholder="inputkan password" value="<?= $row ['password'] ?>">
                </div> 
                

                <div class="form-group">
                   <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?= $row ['jenis_kelamin'] ?>">
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                  </select>       
                </div> 
                <div class="form-group">
                   <label for="jenis">Jenis User</label>
                   <select name="jenis" id="jenis" class="form-control" value="<?= $row ['jenis'] ?>" >
                      <option value="admin">admin</option>
                      <option value="kasir">kasir</option>
                      <option value="manager">manager</option>
                  </select>   
                </div>

            </div>
            <div class="modal-footer">
               <button type="button"class="btn btn-secondary" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-primary">Save</button>

            </div>
            </form>
        </div>
     </div>
</div>
        <?php
        $no++;
        endforeach;
        ?>
    </tbody>
</table>
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="example" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example">Tambah User</h5>   
                <button class="close" data-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?= base_url('user')?>" method="post">
             <div class="modal-body">
                <div class="form-group">
                   <label for="nama">Nama</label>
                   <input type="text"  name="nama" class="form-control" id="nama" placeholder="inputkan nama">
                </div> 
                
                <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text"  name="username" class="form-control" id="username" placeholder="inputkan username">
                </div> 

                <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password"  name="password" class="form-control" id="password" placeholder="inputkan password">
                </div> 
                

                <div class="form-group">
                   <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                  </select>       
                </div> 
                <div class="form-group">
                   <label for="jenis">Jenis User</label>
                   <select name="jenis" id="jenis" class="form-control">
                      <option value="admin">admin</option>
                      <option value="kasir">kasir</option>
                      <option value="manager">manager</option>
                  </select> 

                  
                </div>
            </div>
            <div class="modal-footer">
               <button type="button"class="btn btn-secondary" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-primary">Save</button>

            </div>
            </form>
        </div>
     </div>
</div>




<?= $this->endSection()?>