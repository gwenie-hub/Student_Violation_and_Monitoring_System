<style>
    :root {
        --main-blue: #1d3557;
        --main-red: #e63946;
        --main-white: #fff;
        --main-light-blue: #e3eafc;
        --main-light-red: #fde7eb;
        --main-gray: #f1f3f5;
        --main-dark: #22223b;
    }
    .profile-card {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        background: var(--main-white);
        padding: 2rem 2.5rem 2rem 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .profile-card h2 {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .profile-card .form-label {
        color: var(--main-blue);
        font-weight: 600;
    }
    .profile-card .form-control, .profile-card .form-select {
        border: 1.5px solid var(--main-blue);
        border-radius: 0.5rem;
    }
    .profile-card .form-control:focus, .profile-card .form-select:focus {
        border-color: var(--main-red);
        box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
    }
</style>

<div class="profile-card mt-5 mb-5">
    <h2 class="h4 mb-2"><i class="bi bi-laptop me-2"></i>Browser Sessions</h2>
    <p class="mb-3 text-muted small">Manage and log out your active sessions on other browsers and devices.</p>
        <div class="mb-3 text-muted small">
            <?php echo e(__('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.')); ?>

        </div>
        <!--[if BLOCK]><![endif]--><?php if(count($this->sessions) > 0): ?>
            <div class="mb-4">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <!--[if BLOCK]><![endif]--><?php if($session->agent->isDesktop()): ?>
                                <i class="bi bi-laptop fs-4 text-secondary"></i>
                            <?php else: ?>
                                <i class="bi bi-phone fs-4 text-secondary"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="ms-3">
                            <div class="fw-semibold small">
                                <?php echo e($session->agent->platform() ? $session->agent->platform() : __('Unknown')); ?> - <?php echo e($session->agent->browser() ? $session->agent->browser() : __('Unknown')); ?>

                            </div>
                            <div class="text-muted small">
                                <?php echo e($session->ip_address); ?>,
                                <!--[if BLOCK]><![endif]--><?php if($session->is_current_device): ?>
                                    <span class="text-success fw-semibold"><?php echo e(__('This device')); ?></span>
                                <?php else: ?>
                                    <?php echo e(__('Last active')); ?> <?php echo e($session->last_active); ?>

                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="d-flex align-items-center gap-2 mt-3">
            <button type="button" class="btn btn-warning fw-semibold" wire:click="confirmLogout" wire:loading.attr="disabled">
                <i class="bi bi-box-arrow-right me-1"></i><?php echo e(__('Log Out Other Browser Sessions')); ?>

            </button>
            <?php if (isset($component)) { $__componentOriginala665a74688c74e9ee80d4fedd2b98434 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala665a74688c74e9ee80d4fedd2b98434 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action-message','data' => ['class' => 'ms-3','on' => 'loggedOut']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('action-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3','on' => 'loggedOut']); ?>
                <?php echo e(__('Done.')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala665a74688c74e9ee80d4fedd2b98434)): ?>
<?php $attributes = $__attributesOriginala665a74688c74e9ee80d4fedd2b98434; ?>
<?php unset($__attributesOriginala665a74688c74e9ee80d4fedd2b98434); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala665a74688c74e9ee80d4fedd2b98434)): ?>
<?php $component = $__componentOriginala665a74688c74e9ee80d4fedd2b98434; ?>
<?php unset($__componentOriginala665a74688c74e9ee80d4fedd2b98434); ?>
<?php endif; ?>
        </div>
        <!-- Log Out Other Devices Confirmation Modal -->
        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model.live' => 'confirmingLogout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'confirmingLogout']); ?>
             <?php $__env->slot('title', null, []); ?> 
                <?php echo e(__('Log Out Other Browser Sessions')); ?>

             <?php $__env->endSlot(); ?>
             <?php $__env->slot('content', null, []); ?> 
                <?php echo e(__('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.')); ?>

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <input type="password" class="form-control w-50 d-inline-block" autocomplete="current-password" placeholder="<?php echo e(__('Password')); ?>" x-ref="password" wire:model="password" wire:keydown.enter="logoutOtherBrowserSessions" />
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'password','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('footer', null, []); ?> 
                <button type="button" class="btn btn-secondary" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    <?php echo e(__('Cancel')); ?>

                </button>
                <button type="button" class="btn btn-warning ms-3" wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled">
                    <i class="bi bi-box-arrow-right me-1"></i><?php echo e(__('Log Out Other Browser Sessions')); ?>

                </button>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/profile/logout-other-browser-sessions-form.blade.php ENDPATH**/ ?>