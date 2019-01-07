            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>User</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <strong>User</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar User</h5>
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Alamat</th>
                        <th>Group</th>
                        <th>Last Login</th>
                    </tr>
                    </thead>
                        <tbody>
                         <?php foreach($user as $user) : ?>
                                <tr>
                                <td><?=$user->userid?></td>
                                <td><?=$user->name?></td>
                                <td><?=$user->email?></td>
                                <td><?=$user->username?></td>
                                <td><?=$user->password?></td>
                                <td><?=$user->alamat?></td>
                                <td><?=$user->group?></td>
                                <td><?=$user->lastlogin?></td>
                                </tr>
                         <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>