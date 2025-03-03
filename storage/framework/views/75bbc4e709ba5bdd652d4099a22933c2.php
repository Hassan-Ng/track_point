
<?php $__env->startSection('title', 'Login | Track Point'); ?>
<?php $__env->startSection('content'); ?>
<main class="flex-1 p-8 overflow-y-auto my-scroller-2 flex items-center justify-center">
    <div class="main-child grow bg-[--secondary-bg-color] p-10 rounded-xl shadow-md border border-gray-500 max-w-md text-sm w-full fade-in">
        <h4 class="text-xl font-semibold text-center text-[--primary-color]">Track Point</h4>
        <h1 class="text-3xl font-bold text-center mt-2 text-[--primary-color]">Login</h1>

        <form id="login-form" method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <!-- User Name -->
            <div class="form-group">
                <label class="block text-sm font-medium text-[--secondary-text] mb-1">User Name</label>
                <input type="text" name="username" value="<?php echo e(old('username')); ?>" class="w-full rounded-lg bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out" value="<?php echo e(old('username')); ?>" placeholder="Confirm your user name" required />
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <!-- Display error message for 'name' -->
                    <div class="text-[--border-error] text-sm mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <!-- Password -->
            <div class="form-group">
                <label class="block text-sm font-medium text-[--secondary-text] mb-1">Password</label>
                <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="w-full rounded-lg bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out" placeholder="Enter your password" required />
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <!-- Display error message for 'name' -->
                    <div class="text-[--border-error] text-sm mt-1"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- login Button -->
            <button type="submit" class="bg-[--primary-color] text-[--text-color] px-5 py-2 rounded-lg hover:bg-blue-600 transition-all duration-300 ease-in-out font-medium">Login</button>
        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\TrackPoint\resources\views/auth/login.blade.php ENDPATH**/ ?>