<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS-Only Toast Notification</title>
    <style>
        :root {
            --background: #f3f1f9;
            --toast-background: #292B2D;
            --toast-success: #9CE6A8;
            --text: white;
        }

        .toast-wrap {
            display: flex;
            width: 100%;
            justify-content: center;
            position: relative; /* Ensure it is positioned correctly */
        }

        .toast {
            z-index: 1000;
            position: absolute;
            bottom: 32px;
            align-items: center;
            border-radius: 0.375rem;
            background-color: var(--toast-background);
            color: var(--text);
            width: 100%;
            max-width: 20rem;
            transform: translateY(30px);
            opacity: 0;
            visibility: hidden;
            animation: fade-in 3s linear;
            border-radius: 0.75rem;
            box-shadow: var(--post-image-box-shadow);
        }

        .notification__description {
            display: flex;
            gap: 0.25rem;
            align-items: center;
            font-size: 1rem;
            flex-grow: 2;
        }

        .notification__icon {
            height: 1.625rem;
            width: 1.625rem;
            margin-right: 0.25rem;
        }

        .notification__body {
            display: flex;
            flex-direction: row;
            padding: 0.75rem;
        }

        .notification__button {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 0;
            border: none;
            background: none;
            font-size: 1.1rem;
            white-space: nowrap;
            margin-left: 1.25rem;
            flex-grow: 1;
            color: var(--text);
        }

        .notification__button:hover {
            text-decoration: underline;
        }

        .notification__progress {
            position: absolute;
            left: 0.5rem;
            bottom: 0.25rem;
            width: calc(100% - 1rem);
            height: 0.1875rem;
            transform: scaleX(0);
            transform-origin: left;
            background: linear-gradient(to right, var(--toast-background), var(--toast-success));
            border-radius: inherit;
            animation: progress 2.5s 0.3s linear;
        }

        .icon__wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 50%;
            background-color: var(--toast-success);
            margin-right: 0.5rem;
            padding: 0.375rem;
        }

        .icon__wrapper svg {
            stroke: var(--toast-background);
            stroke-width: 3px;
        }

        @keyframes fade-in {
            5% {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            95% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes progress {
            to {
                transform: scaleX(1);
            }
        }

        /* Styles to control toast visibility */
        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]:checked ~ .toast-wrap .toast {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Hidden checkbox to control toast visibility -->
        <input type="checkbox" id="ToastSwitch">

        <!-- Navigation menu -->
        <nav class="nav_menu">
            <!-- Label acts as the button to show the toast -->
            <label for="ToastSwitch">
                <button type="button">Show Toast</button>
            </label>
        </nav>

        <!-- Toast notification -->
        <div class="toast-wrap">
            <figure class="toast">
                <div class="notification__body">
                    <div class="notification__description">
                        <div class="icon__wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" viewBox="0 0 19.2 19.2" stroke-width="1.6" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        Report is saved!
                    </div>
                    <button class="notification__button">
                        Edit report
                    </button>
                </div>
                <div class="notification__progress"></div>
            </figure>
        </div>
    </div>
</body>
</html>
