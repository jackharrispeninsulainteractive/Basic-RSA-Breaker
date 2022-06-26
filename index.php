<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - A1_Q4
 * Last Updated - 23/06/2022
 */
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RSA Encrypt & Decrypt</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<main>

    <section style="width: 100%">
        <h1 style="text-align: center; padding-bottom: 16px">Breaking RSA Key Tool</h1>
        <p style="text-align: center">This is a basic tool designed to assist you in breaking basic RSA encryption for the RMIT Security in Computing and Information Technology Assignment 1</p>
    </section>
    <section>
        <h1>Basic Encrypt</h1>
        <form action="javascript:Application.instance.basicEncrypt()">
            <label>
                (e) Encryption
                <br>
                <input type="number" id="basic_encrypt_e" required>
            </label>
            <br>
            <label>
                (m) Modulas
                <br>
                <input type="number" id="basic_encrypt_m" required>
            </label>
            <br>
            <label>
                Unencrypted message input (Whole numbers only)
                <br>
                <input type="number" id="basic_encrypt_encrypted_message_in" required>
            </label>
            <br>
            <label>
                Encrypted Message output
                <br>
                <input type="number" disabled id="basic_encrypt_encrypted_message_out">
            </label>
            <button>Calculate</button>
        </form>
    </section>

    <section>
        <h1>Basic Decrypt</h1>
        <form action="javascript:Application.instance.basicDecrypt()">
            <label>
                (d) De-Encryption
                <br>
                <input type="number" id="basic_decrypt_d" required>
            </label>
            <br>
            <label>
                (m) Modulas
                <br>
                <input type="number" id="basic_decrypt_m" required>
            </label>
            <br>
            <label>
                Encrypted message input (Whole numbers only)
                <br>
                <input type="number" id="basic_decrypt_encrypted_message_in" required>
            </label>
            <br>
            <label>
                Unencrypted message output
                <br>
                <input type="number" disabled id="basic_decrypt_encrypted_message_out">
            </label>
            <button>Calculate</button>
        </form>
    </section>

    <section>
        <h2>Example</h2>
        <p>Encrypt:</p>
        <p>Encryption = 5</p>
        <p>Modulas = 14</p>
        <p>Message = 2</p>
        <p>Expected Output = 4</p>

    </section>
    <section>
        <h2>Example</h2>

        <p>Decrypt:</p>
        <p>De-Encryption key = 11</p>
        <p>Modulas = 14</p>
        <p>Encrypted Message = 4</p>
        <p>Expected Output = 2</p>
    </section>

    <section style="width: 100%">
        <h2>Breaking RSA with prime factorization</h2>
        <form action="javascript: Application.instance.breakRSA()">
            <label>
                n (Public key)
                <br>
                <input type="number" required id="breaking_rsa_n">
            </label>
            <br>
            <label>
                e (Public Exponent)
                <br>
                <input type="number"  id="breaking_rsa_public_exponent">
            </label>
            <br>
            <label>
                p (Prime Factor 1)
                <br>
                <input type="number" disabled id="breaking_rsa_prime_factor_1">
            </label>
            <br>
            <label>
                q (Prime Factor 2)
                <br>
                <input type="number" disabled id="breaking_rsa_prime_factor_2">
            </label>
            <br>
            <label>
                φn Decoded (φn = (p-1) * (q-1))
                <br>
                <input type="number" disabled id="breaking_rsa_decoded_n">
            </label>
            <br>
            <label>
                d (Private Key)
                <br>
                <input type="number" disabled id="breaking_rsa_decoded_d">
            </label>
            <br>
            <label>
                c (Cipher text)
                <br>
                <input type="number"  id="breaking_rsa_decoded_c">
            </label>
            <br>
            <label>
                m (Decoded Message)
                <br>
                <input type="number" disabled id="breaking_rsa_decoded_cipher_output">
            </label>
            <br>
            <label>
                m (ReEncoded Confirmation, must match cipher text input))
                <br>
                <input type="number" disabled id="breaking_rsa_decoded_cipher_confirmation_output">
            </label>

            <br>
            <button>Calculate</button>
        </form>
    </section>
</main>

<footer>
    <p>Created by Jack Harris 24/06/2022 for RMIT Security in Computing and Information Technology Assignment 1</p>
</footer>

<script src="https://cdn.jsdelivr.net/gh/peterolson/BigInteger.js@1.6.40/BigInteger.min.js"></script>
<script src="Application.js"></script>

</body>
</html>