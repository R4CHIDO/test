<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>

<div class="col-lg grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <div>
                    <h4 class="card-title">Community members</h4>
                    <p class="card-description">
                        Here you can find all the members of your community.
                    </p>
                </div>

                <div>
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-sort"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <h6 class="dropdown-header">Sort By</h6>
                                <li><a class="dropdown-item" href=<?= site_url('Users/allMembers/SortBy/Name')?>>Name</a></li>
                                <li><a class="dropdown-item" href=<?= site_url('Users/allMembers/SortBy/Gender')?>>Gender</a></li>
                                <li><a class="dropdown-item" href=<?= site_url('Users/allMembers/SortBy/MemberType')?>>Member Type</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-filter"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <h6 class="dropdown-header">Filter</h6>
                                <li>
                                    <a class="dropdown-item" href=<?= site_url('Users/allMembers/FilterBy/Gender')?>>Gender</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
                                    <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                                        <li>
                                            <a class="dropdown-item" href="#">Multi level 1</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Multi level 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="dropdown-item" href=<?= site_url('Users/allMembers/FilterBy/MemberType')?>>Member Type</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Member Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) :  ?>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces/face1.jpg" alt="image">
                                </td>
                                <td>
                                    <a class="fw-bold text-primary" href="index.php" style="text-decoration: none !important;">
                                        <?= $user->first_name . " " . $user->last_name ?>
                                    </a>
                                <td><?= $user->gender ?></td>
                                <td><?= $user->tel ?></td>
                                <td class="text-danger"><?= $user->user_cat_label ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon">
                                        <i class="mdi mdi-information mdi-24px text-info"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal">
                                        <i class="mdi mdi-account-remove mdi-24px text-danger"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">...</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>
</div>

<?php $this->endsection(); ?>