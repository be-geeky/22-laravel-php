

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Experiences</div>
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <div class="panel-body">
                    <?php echo e(link_to_route('exp.create', '+ Nouvelle expérience', null, ['class' => 'btn btn-success'])); ?>

                    <br>
                    <table class="table">
                        <tr>
                            <th>Nom</th>
                            <th>Action</th>
                            <th>Vue (en cours)</th>
                            <th>Gallerie</th>
                            <th>Lien</th>
                        </tr>
                        <?php foreach($users as $user): ?>
                            <?php if($user->id_user == Auth::user()->id): ?>
                                <?php foreach($exps as $exp): ?>
                                <tr>
                                  <?php if($user->id_exp == $exp->id AND $exp->delete != 1): ?>
                                    <td><?php echo e(link_to_route('exp.show', $exp->name, [$exp->id])); ?></td>
                                    <td>
                                        <?php echo e(link_to_route('exp.edit', 'Editer', [$exp->id], ['class' => 'btn btn-primary'])); ?>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                          Supprimer
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Suppression de l'expérience</h4>
                                              </div>
                                              <div class="modal-body">
                                                Voulez-vous vraiment supprimer ?
                                                <br>
                                                <?php echo e($exp->name); ?>

                                              </div>
                                                <div class="modal-footer" style="display: flex; flex-direction: row;" >
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <?php echo Form::open(array('route'=>['exp.destroy', $exp->id], 'method'=>'DELETE')); ?>

                                                <?php echo Form::button('Effacer', ['class'=>'btn btn-danger', 'type'=>'submit']); ?>

                                                <?php echo Form::close(); ?>

                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                    </td>
                                    <td>
                                        <?php if($exp->photo): ?>
                                            <a class="btn btn-info" href="<?php echo e(url('hotspot')); ?>"> Hotspot</a></td>
                                        <?php else: ?>
                                            aucune photo
                                        <?php endif; ?>
                                    <td>
                                        <?php if($exp->photo): ?>
                                            <a href="<?php echo e(route('exp.photo.index',[$exp->id])); ?>"> <img src="<?php echo e(URL::asset('/img/'.$exp->id.'/'.$exp->photo.'.PNG')); ?>"
                                            alt="<?php echo e($exp->photo); ?>" style="width:200px;height:100px;" /></a>

                                        <?php else: ?>
                                            <?php echo e(link_to_route('exp.photo.index', 'Gallerie', [$exp->id], ['class' => 'btn btn-info'])); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        "embed"
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>

                    <!-- pagination-->
                    <?php echo e($exps->links()); ?>


                </div>
            </div>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>