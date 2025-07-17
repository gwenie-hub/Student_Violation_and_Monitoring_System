
<div class="card shadow-sm border mb-4 bg-white" style="max-width: 650px; margin: 0 auto;">
    <div class="card-header bg-white border-bottom pb-2">
        <h5 class="mb-1 fw-semibold text-primary"><i class="bi bi-shield-lock me-2"></i>Two Factor Authentication</h5>
        <p class="mb-0 text-muted small">Add additional security to your account using two factor authentication.</p>
    </div>
    <div class="card-body p-4">
        <h6 class="fw-semibold mb-2">
            <!--[if BLOCK]><![endif]--><?php if($this->enabled): ?>
                <!--[if BLOCK]><![endif]--><?php if($showingConfirmation): ?>
                    <?php echo e(__('Finish enabling two factor authentication.')); ?>

                <?php else: ?>
                    <?php echo e(__('You have enabled two factor authentication.')); ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>
                <?php echo e(__('You have not enabled two factor authentication.')); ?>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </h6>
        <div class="mb-3 text-muted small">
            <?php echo e(__('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.')); ?>

        </div>
        <!--[if BLOCK]><![endif]--><?php if($this->enabled): ?>
            <!--[if BLOCK]><![endif]--><?php if($showingQrCode): ?>
                <div class="mb-3">
                    <div class="mb-2 fw-semibold">
                        <!--[if BLOCK]><![endif]--><?php if($showingConfirmation): ?>
                            <?php echo e(__('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.')); ?>

                        <?php else: ?>
                            <?php echo e(__('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.')); ?>

                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="p-2 bg-white border rounded d-inline-block">
                        <?php echo $this->user->twoFactorQrCodeSvg(); ?>

                    </div>
                    <div class="mt-2 text-muted small">
                        <span class="fw-semibold"><?php echo e(__('Setup Key')); ?>:</span> <?php echo e(decrypt($this->user->two_factor_secret)); ?>

                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php if($showingConfirmation): ?>
                    <div class="mb-3">
                        <label for="code" class="form-label"><?php echo e(__('Code')); ?></label>
                        <input id="code" type="text" name="code" class="form-control w-50" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'code','class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'code','class' => 'mt-2']); ?>
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
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($showingRecoveryCodes): ?>
                <div class="mb-3">
                    <div class="fw-semibold mb-2">
                        <?php echo e(__('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.')); ?>

                    </div>
                    <div class="row g-1 bg-light rounded p-3 font-monospace text-sm">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = json_decode(decrypt($this->user->two_factor_recovery_codes), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-4"><?php echo e($code); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="d-flex flex-wrap gap-2 mt-4">
            <!--[if BLOCK]><![endif]--><?php if(! $this->enabled): ?>
                <?php if (isset($component)) { $__componentOriginalbec74c427ea01267d1faf57b533fd04e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec74c427ea01267d1faf57b533fd04e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirms-password','data' => ['wire:then' => 'enableTwoFactorAuthentication']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirms-password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:then' => 'enableTwoFactorAuthentication']); ?>
                    <button type="button" class="btn btn-primary" wire:loading.attr="disabled">
                        <i class="bi bi-shield-plus me-1"></i><?php echo e(__('Enable')); ?>

                    </button>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $attributes = $__attributesOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $component = $__componentOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__componentOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
            <?php else: ?>
                <!--[if BLOCK]><![endif]--><?php if($showingRecoveryCodes): ?>
                    <?php if (isset($component)) { $__componentOriginalbec74c427ea01267d1faf57b533fd04e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec74c427ea01267d1faf57b533fd04e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirms-password','data' => ['wire:then' => 'regenerateRecoveryCodes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirms-password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:then' => 'regenerateRecoveryCodes']); ?>
                        <button type="button" class="btn btn-outline-primary" wire:loading.attr="disabled">
                            <i class="bi bi-arrow-repeat me-1"></i><?php echo e(__('Regenerate Recovery Codes')); ?>

                        </button>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $attributes = $__attributesOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $component = $__componentOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__componentOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
                <?php elseif($showingConfirmation): ?>
                    <?php if (isset($component)) { $__componentOriginalbec74c427ea01267d1faf57b533fd04e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec74c427ea01267d1faf57b533fd04e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirms-password','data' => ['wire:then' => 'confirmTwoFactorAuthentication']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirms-password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:then' => 'confirmTwoFactorAuthentication']); ?>
                        <button type="button" class="btn btn-success" wire:loading.attr="disabled">
                            <i class="bi bi-check2-circle me-1"></i><?php echo e(__('Confirm')); ?>

                        </button>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $attributes = $__attributesOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $component = $__componentOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__componentOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalbec74c427ea01267d1faf57b533fd04e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec74c427ea01267d1faf57b533fd04e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirms-password','data' => ['wire:then' => 'showRecoveryCodes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirms-password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:then' => 'showRecoveryCodes']); ?>
                        <button type="button" class="btn btn-outline-secondary" wire:loading.attr="disabled">
                            <i class="bi bi-key me-1"></i><?php echo e(__('Show Recovery Codes')); ?>

                        </button>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $attributes = $__attributesOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $component = $__componentOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__componentOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php if($showingConfirmation): ?>
                    <?php if (isset($component)) { $__componentOriginalbec74c427ea01267d1faf57b533fd04e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec74c427ea01267d1faf57b533fd04e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirms-password','data' => ['wire:then' => 'disableTwoFactorAuthentication']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirms-password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:then' => 'disableTwoFactorAuthentication']); ?>
                        <button type="button" class="btn btn-secondary" wire:loading.attr="disabled">
                            <i class="bi bi-x-circle me-1"></i><?php echo e(__('Cancel')); ?>

                        </button>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $attributes = $__attributesOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $component = $__componentOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__componentOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalbec74c427ea01267d1faf57b533fd04e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbec74c427ea01267d1faf57b533fd04e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirms-password','data' => ['wire:then' => 'disableTwoFactorAuthentication']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirms-password'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:then' => 'disableTwoFactorAuthentication']); ?>
                        <button type="button" class="btn btn-danger" wire:loading.attr="disabled">
                            <i class="bi bi-shield-x me-1"></i><?php echo e(__('Disable')); ?>

                        </button>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $attributes = $__attributesOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__attributesOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbec74c427ea01267d1faf57b533fd04e)): ?>
<?php $component = $__componentOriginalbec74c427ea01267d1faf57b533fd04e; ?>
<?php unset($__componentOriginalbec74c427ea01267d1faf57b533fd04e); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/profile/two-factor-authentication-form.blade.php ENDPATH**/ ?>