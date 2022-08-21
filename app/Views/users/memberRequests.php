<?php $this->extend("Layout"); ?>

<?php $this->section("content"); ?>

<div class="col-lg grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Member requsets</h4>
            <p class="card-description">
                You are able to<code>modify</code>the new member personal informations.
            </p>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Filière</th>
                            <th>Applying date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) :  ?>
                            <tr>
                                <td>
                                <button type="button" class="btn btn-link text-primary">
                                    <?= $user->first_name . " " . $user->last_name ?>
                                </button>
                                <td><?= $user->group_label?></td>
                                <td class="text-danger"> <?=$user->created_at->toLocalizedString('dd MMM yyyy') ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon">
                                        <i class="mdi mdi-account-check mdi-24px text-success"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded btn-icon">
                                        <i class="mdi mdi-account-edit mdi-24px text-primary icn2"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-rounded btn-icon">
                                        <i class="mdi mdi-account-remove mdi-24px text-danger"></i>
                                    </button>
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