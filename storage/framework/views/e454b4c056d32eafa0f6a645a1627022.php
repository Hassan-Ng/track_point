
<?php $__env->startSection('title', 'Create Invoice | Track Point'); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto pb-24">
        <h1 class="text-4xl font-bold mb-8 text-center text-[--primary-color] animate-fade-in uppercase">
            Track Point
        </h1>

        <div class="article_image opacity-0 absolute left-[17rem] bg-[--secondary-bg-color] rounded-lg shadow-xl border border-[--h-bg-color] p-4 overflow-hidden max-w-sm animate-fade-in w-[15rem] w-[15rem] transition-all duration-200 ease-in-out">
            <div class="img aspect-square h-full rounded overflow-hidden">
                <img src="<?php echo e(asset('storage/uploads/images/invoice_icon.png')); ?>" alt=""
                    class="w-full h-full object-cover">
                <div class="absolute top-5 left-5 flex gap-2">
                    <div class="img_dot w-[0.6rem] h-[0.6rem] bg-[--border-success] rounded-full">
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form id="form" action="<?php echo e(route('invoice.store')); ?>" method="post" enctype="multipart/form-data"
            class="bg-[--secondary-bg-color] rounded-lg shadow-xl border border-[--h-bg-color] pt-4 max-w-4xl mx-auto animate-fade-in relative">
            <?php echo csrf_field(); ?>
            <div
                class="form-title text-center absolute top-0 left-0 w-full bg-[--primary-color] py-1 shadow-lg uppercase font-semibold text-sm rounded-tl-md rounded-tr-md">
                <h4>Create Invoice</h4>
            </div>
            <!-- Step : Information -->
            <div id="step1" class="step1 space-y-6 m-8 animate-slide-in">
                <div class="flex justify-between gap-4">
                    <div class="form-group w-full">
                        <input id="article_details" type="text" disabled class="w-full rounded-md bg-[--bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out" value="<?php echo e($data); ?>" />
                    </div>
                </div>
                <div class="flex justify-between gap-4">
                    <div class="form-group grow">
                        <input id="arrticle_no" type="text"
                            class="w-full rounded-md bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out"
                            placeholder="Enter Article No." />
                    </div>
                    <div class="form-group w-1/3 relative">
                        <input id="quantity" type="text"
                            class="w-full rounded-md bg-[--h-bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out"
                            placeholder="Enter Quantity" />
                        <span
                            class="absolute right-3 bg-[--h-bg-color] top-1/2 transform -translate-y-1/2 text-gray-400 transition-all duration-300 ease-in-out">/Pcs</span>
                    </div>
                    <div class="form-group w-1/3 relative">
                        <input id="quantity_in_stock" type="text" disabled placeholder="Stock"
                            class="w-full rounded-md bg-[--bg-color] border-gray-500 text-[--text-color] px-3 py-2 border focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 ease-in-out" />
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">/Pcs</span>
                    </div>
                    <div class="form-group flex w-10 shrink-0">
                        <input type="button" value="+"
                            class="w-full bg-[--primary-color] text-[--text-color] rounded-md cursor-pointer border border-[--primary-color]"
                            onclick="addArticle()" />
                    </div>
                </div>
                <div id="rate-table" class="w-full text-left">
                    <div class="flex justify-between items-center bg-[--h-bg-color] rounded-md py-2 px-5 mb-4">
                        <div class="w-[10%]">Article No.</div>
                        <div class="w-1/6">Description</div>
                        <div class="w-[10%]">Quantity/Pcs</div>
                        <div class="w-1/6 text-center">Rate/Pcs</div>
                        <div class="w-1/6 text-center">Total</div>
                        <div class="w-[10%] text-right">Action</div>
                    </div>
                    <div id="article-list" class="space-y-4 h-[250px] overflow-y-auto my-scroller-2">
                        <div class="text-center bg-[--h-bg-color] rounded-md py-2 px-5">
                            No Article Added
                        </div>
                    </div>
                </div>
                <div id="calc-bottom" class="flex w-full gap-4">
                    <div class="total flex justify-between items-center bg-[--h-bg-color] rounded-md py-2 px-4 w-full">
                        <div class="text-nowrap">Total Qty - Pcs.</div>
                        <div class="grow text-right">0</div>
                    </div>
                    <div class="final flex justify-between items-center bg-[--h-bg-color] rounded-md py-2 px-4 w-full">
                        <div class="text-nowrap">Total.</div>
                        <div id="total-amount" class="grow text-right">0.00</div>
                    </div>
                    <div class="final flex justify-between items-center bg-[--h-bg-color] rounded-md py-2 px-4 w-full">
                        <div class="text-nowrap">Off - %.</div>
                        <input type="number" oninput="calculateNetAmount(this.value)" name="discount" id="discount-inp"
                            class="text-right bg-transparent outline-none border-none w-full" min="0" max="100" placeholder="Enter here"/>   
                    </div>
                    <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <!-- Display error message for 'discount' -->
                        <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="final flex justify-between items-center bg-[--h-bg-color] rounded-md py-2 px-4 w-full">
                        <div class="text-nowrap">Net.</div>
                        <div id="net-amount" class="grow text-right">0.00</div>
                    </div>
                </div>
            </div>
        </form>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Softwares\TrackPoint\resources\views/article/add-image.blade.php ENDPATH**/ ?>