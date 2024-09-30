<!-- Hidden checkbox to control the visibility of the toast -->
<input type="checkbox" style="display:none" id="id-toast-btn">

<!-- Toast icon label -->
<label for="id-toast-btn" class="icon">
    <svg width="1.26em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
        <path d="M155.6 17.3C163 3 179.9-3.6 195 1.9L320 47.5l125-45.6c15.1-5.5 32 1.1 39.4 15.4l78.8 152.9c28.8 55.8 10.3 122.3-38.5 156.6L556.1 413l41-15c16.6-6 35 2.5 41 19.1s-2.5 35-19.1 41l-71.1 25.9L476.8 510c-16.6 6.1-35-2.5-41-19.1s2.5-35 19.1-41l41-15-31.3-86.2c-59.4 5.2-116.2-34-130-95.2L320 188.8l-14.6 64.7c-13.8 61.3-70.6 100.4-130 95.2l-31.3 86.2 41 15c16.6 6 25.2 24.4 19.1 41s-24.4 25.2-41 19.1L92.2 484.1 21.1 458.2c-16.6-6.1-25.2-24.4-19.1-41s24.4-25.2 41-19.1l41 15 31.3-86.2C66.5 292.5 48.1 226 76.9 170.2L155.6 17.3zm44 54.4l-27.2 52.8L261.6 157l13.1-57.9L199.6 71.7zm240.9 0L365.4 99.1 378.5 157l89.2-32.5L440.5 71.7z"/>
    </svg>
</label>

<?php if (session()->has('toast')) : ?>
    <?php $toast = session('toast'); ?>
    <div class="toast-wrap">
        <figure class="toast">
            <div class="toast-body">
                <div class="toast-icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> 
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </div>

                <!-- Toast description -->
                <div class="toast-description">
                    <p><?= htmlspecialchars($toast['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>

                <!-- Button if text is provided -->
                <?php if (!empty($toast['btnText'])): ?>
                    <button class="toast-btn">
                        <a href="<?= htmlspecialchars($toast['btnHref'] ?? '#', ENT_QUOTES, 'UTF-8'); ?>">
                            <?= htmlspecialchars($toast['btnText'], ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </button>
                <?php endif; ?>
            </div>
            <div class="toast-progress"></div>
        </figure>
    </div>

    <!-- Clear the session flash after displaying -->
    <?php session()->forget('toast'); ?>
<?php endif; ?>
