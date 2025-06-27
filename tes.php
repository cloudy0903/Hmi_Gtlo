<style>
        /* HMI Colors */
        .bg-hmi-green {
            background-color: #007a3d;
        }

        .text-hmi-green {
            color: #007a3d;
        }

        .form-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        h2 {
            font-weight: bold;
            color: #007a3d;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .btn-primary {
            background-color: #007a3d;
            display: inline-flex;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
            border: none;
        }

        .btn-primary i {
            margin-right: 8px;
        }

        .btn-primary:hover {
            background-color: #005f28;
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 20px;
            background-color: #dc3545;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-reset i {
            margin-right: 8px;
        }

        .btn-reset:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #343a40;
            color: #f8f9fa;
            font-weight: 600;
            font-size: 14px;
            border-radius: 50px;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #343a40;
        }

        .btn-secondary a {
            color: inherit;
            text-decoration: none;
        }
        .btn-secondary a:hover {
            color: inherit;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007a3d;
            box-shadow: 0 0 5px rgba(0, 122, 61, 0.2);
        }

        textarea.form-control {
            resize: vertical;
        }

        /* Styling for button container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        /* Toast styles */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            max-width: 350px;
        }
    </style>