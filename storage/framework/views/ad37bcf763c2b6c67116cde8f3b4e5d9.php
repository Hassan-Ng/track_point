<!--  -->
<!-- Footer Component Start -->
<footer class="w-full bg-[--secondary-bg-color] px-3 py-1 shadow-lg z-30 pl-20 text-sm fade-in">
    <div class="container mx-auto flex justify-between items-center">
        <?php if(request()->is('users/create') || request()->is('article/create') || request()->is('customer/create') || request()->is('invoice/create') || request()->is('payment/create')): ?>
            <button id="prevBtn" class="bg-[--h-bg-color] text-[--text-color] px-5 py-1 rounded-md hover:scale-95 transition-all ease-in-out flex items-center disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <i class='bx bx-chevrons-left text-lg mr-1'></i> Previous
            </button>
        <?php endif; ?>
        <div class="flex justify-between items-center mx-auto px-8 py-3">
            <p class="text-center text-sm text-[--secondary-text] mx-3">&copy; Spark Pair 2024. All rights reserved.</p>
            <div class="flex justify-center mx-3 ">
                <a href="https://wa.me/+923165825495?text=Dear%20Spark%20Pair%20Team,%20I%20would%20like%20to%20learn%20more%20about%20your%20services.%0A%0APlease%20provide%20details%20on%20how%20your%20solutions%20can%20help%20with%20business%20management%20and%20the%20features%20that%20might%20be%20beneficial.%0A%0ARegards,%0AHasan%20Raza%0A%2B92-316-5825495" target="_blank" class="text-[--primary-color] hover:underline">+923165825495</a>
                <span class="mx-2">|</span>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sparkpair15@gmail.com&su=Subject&body=Message%20content" target="_blank" class="text-[--primary-color] hover:underline">sparkpair15@gmail.com</a>
            </div>
            <?php if(request()->is('login') || request()->is('register')): ?>
                <div class="flex justify-center mx-5 fixed right-0">
                    <button id="themeToggle" onclick="changeTheme()" class="text-sm text-[--secondary-text] hover:text-[--primary-color]">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <?php if(request()->is('users/create') || request()->is('article/create') || request()->is('customer/create') || request()->is('invoice/create') || request()->is('payment/create')): ?>
            <button id="saveBtn" class="bg-[--success-color] text-[--text-color] px-3 py-1 rounded-md hover:bg-[--h-success-color] hover:scale-95 transition-all ease-in-out flex items-center gap-1 hidden">
                <i class='bx bxs-save text-lg'></i> Save
            </button>
        <?php endif; ?>
        <?php if(request()->is('users/create') || request()->is('article/create') || request()->is('customer/create') || request()->is('invoice/create') || request()->is('payment/create')): ?>
            <button id="nextBtn" class="bg-[--primary-color] text-[--text-color] px-5 py-1 rounded-md hover:bg-[--h-primary-color] hover:scale-95 transition-all ease-in-out flex items-center">
                Next <i class='bx bxs-chevrons-right text-lg ml-1'></i>
            </button>
        <?php endif; ?>
    </div>
    <?php if(request()->is('users/create') || request()->is('article/create') || request()->is('customer/create') || request()->is('invoice/create') || request()->is('payment/create')): ?>
        <script>
            let currentStep = 1;
            let noOfSteps = document.querySelector(".progress-indicators").children.length;

            function nextStep(step) {
                validateForNextStep()
                if (!validateForNextStep()) {
                    return isValid; // Return final validation status
                }

                let step1Doms = document.querySelectorAll(`.step${currentStep}`);
                let step2Doms = document.querySelectorAll(`.step${step + 1}`);

                if (currentStep === noOfSteps) {
                    return;
                }

                if (step1Doms) {
                    step1Doms.forEach((dom) => dom.classList.add('hidden'));
                }
                if (step2Doms) {
                    step2Doms.forEach((dom) => dom.classList.remove('hidden'));
                }

                document.getElementById(`step${step + 1}-indicator`).classList.remove('bg-[--h-bg-color]');
                document.getElementById(`step${step + 1}-indicator`).classList.add('bg-[--primary-color]');
                if (currentStep <= step) {
                    document.getElementById(`step${currentStep}-indicator`).classList.remove('bg-[--primary-color]');
                    document.getElementById(`step${currentStep}-indicator`).classList.add('bg-[--h-bg-color]');
                };
                document.getElementById('progress-bar').style.width = `${(step + 1) * (100/noOfSteps)}%`;

                currentStep = step + 1;
                updateButtons();

                <?php if(request()->is('invoice/create')): ?>
                    generateInvoice()
                    let btnInForm = document.getElementById('btn-in-form');
                    btnInForm.classList.remove('hidden');
                    let form = document.getElementById('form');
                    form.classList.remove('bg-[--secondary-bg-color]');
                    form.classList.add('bg-white');
                <?php endif; ?>
            }

            function prevStep(step) {
                let step1Doms = document.querySelectorAll(`.step${step - 1}`);
                let step2Doms = document.querySelectorAll(`.step${currentStep}`);

                if (step <= 1) {
                    return;
                }

                if (step1Doms) {
                    step1Doms.forEach((dom) => dom.classList.remove('hidden'));
                }
                if (step2Doms) {
                    step2Doms.forEach((dom) => dom.classList.add('hidden'));
                }

                document.getElementById(`step${step - 1}-indicator`).classList.add('bg-[--primary-color]');
                document.getElementById(`step${step - 1}-indicator`).classList.remove('bg-[--h-bg-color]');
                document.getElementById(`step${currentStep}-indicator`).classList.remove('bg-[--primary-color]');
                document.getElementById(`step${currentStep}-indicator`).classList.add('bg-[--h-bg-color]');
                document.getElementById('progress-bar').style.width = `${(step - 1) * (100/noOfSteps)}%`;
                currentStep = step - 1;
                updateButtons();

                <?php if(request()->is('invoice/create')): ?>
                    let btnInForm = document.getElementById('btn-in-form');
                    btnInForm.classList.add('hidden');
                    let form = document.getElementById('form');
                    form.classList.add('bg-[--secondary-bg-color]');
                    form.classList.remove('bg-white');
                <?php endif; ?>
            }

            function gotoStep(step) {
                if (currentStep <= step) {
                    nextStep(step - 1);
                } else if (currentStep > step) {
                    prevStep(step + 1);
                }
            }

            function updateButtons() {
                document.getElementById('prevBtn').disabled = currentStep === 1;
                document.getElementById('nextBtn')?.classList.toggle('hidden', currentStep === noOfSteps);
                document.getElementById('saveBtn')?.classList.toggle('hidden', currentStep !== noOfSteps);
            }


            document.getElementById('nextBtn')?.addEventListener('click', () => nextStep(currentStep));
            document.getElementById('prevBtn').addEventListener('click', () => prevStep(currentStep));
            document.getElementById('saveBtn').addEventListener('click', () => {
                // submit the form
                document.getElementById('form').submit();
            });

            document.addEventListener("keydown", (e) => {
                // check if control ke is pressed
                if (e.ctrlKey && e.key === "ArrowRight") {
                    nextStep(currentStep);
                } else if ((e.ctrlKey && e.key === "ArrowLeft")) {
                    prevStep(currentStep);
                }
            })
        </script>
    <?php endif; ?>
    <script>
        function changeTheme() {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);

            themeIcon?.classList.toggle('fa-sun');
            themeIcon?.classList.toggle('fa-moon');
        }
    </script>
</footer>
<!-- Footer Component End -->
<!--  -->
<?php /**PATH E:\Softwares\TrackPoint\resources\views/layouts/components/footer.blade.php ENDPATH**/ ?>