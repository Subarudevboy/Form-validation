<?php
$name = htmlspecialchars($_POST['name'] ?? 'Guest');
$email = htmlspecialchars($_POST['email'] ?? 'N/A');
$age = intval($_POST['age'] ?? 0);

$isEligible = $age >= 18;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Results</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

      body {
            font-family: 'Inter', sans-serif;
            background: #FBF7F2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .result-container {
            width: 100%;
            max-width: 420px;
            background: #FBF7F2;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 10px 20px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #6B4423;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .greeting {
            font-size: 16px;
            color: #6B4423;
            margin-bottom: 32px;
            font-weight: 500;
        }

        .info-section {
            margin-bottom: 28px;
        }

        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: #6B4423;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            color: #FBF7F2;
            padding: 10px 12px;
            background: #5D3A1A;
            border-radius: 6px;
            border-left: 3px solid #8B5A3C;
        }

        .eligibility-section {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #6B4423;
        }

        .status-label {
            font-size: 12px;
            font-weight: 600;
            color: #6B4423;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .status-message {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            text-align: center;
        }

        .status-eligible {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1.5px solid #c8e6c9;
        }

        .status-ineligible {
            background: #ffebee;
            color: #c62828;
            border: 1.5px solid #ffcdd2;
        }

        .action-links {
            margin-top: 32px;
            display: flex;
            gap: 12px;
        }

        .btn {
            flex: 1;
            padding: 11px 16px;
            text-align: center;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            border: 1.5px solid transparent;
            cursor: pointer;
            display: inline-block;
        }

        .btn-primary {
            background: #8B5A3C;
            color: white;
        }

        .btn-primary:hover {
            background: #6B4423;
            box-shadow: 0 4px 12px rgba(139, 90, 60, 0.3);
        }

        .btn-secondary {
            background: #FBF7F2;
            color: #6B4423;
            border-color: #8B5A3C;
        }

        .btn-secondary:hover {
            background: #F5F1ED;
            border-color: #6B4423;
        }

        @media (max-width: 480px) {
            .result-container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
            }

            .action-links {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

    
        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #6B4423;
            text-align: center;
            font-size: 12px;
            color: #6B4423;
            letter-spacing: 0.3px;
        }

    </style>
</head>
<body>
    <div class="result-container">
        <h1>Submission Complete</h1>
        <p class="greeting">Thank you, <strong><?php echo $name; ?></strong>! Your information has been received.</p>

        <div class="info-section">
            <div class="info-label">Full Name</div>
            <div class="info-value"><?php echo $name; ?></div>
        </div>

        <div class="info-section">
            <div class="info-label">Email Address</div>
            <div class="info-value"><?php echo $email; ?></div>
        </div>

        <div class="info-section">
            <div class="info-label">Age</div>
            <div class="info-value"><?php echo $age; ?></div>
        </div>

        <div class="eligibility-section">
            <div class="status-label">Eligibility Status</div>
            <div class="status-message <?php echo $isEligible ? 'status-eligible' : 'status-ineligible'; ?>">
                <?php 
                    if ($isEligible) {
                        echo "✓ You are eligible (18 or above)";
                    } else {
                        echo "✗ You are not eligible (under 18)";
                    }
                ?>
            </div>
        </div>

        <div class="action-links">
            <a href="form.html" class="btn btn-secondary">Go Back</a>
        </div>

   
        <footer>
            DEMILADE ILESANMI | RUN/CMP/23/15262 | 300 LEVEL | COMPUTER SCIENCE
        </footer>
    </div>
</body>
</html>
