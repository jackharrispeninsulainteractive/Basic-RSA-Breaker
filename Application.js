class Application {

    static instance = new Application();
    domain = "http://localhost";
    domainLocation = "/A1_Q4/";
    primeNumbers;


    constructor() {

        fetch(this.domain+this.domainLocation+"prime_numbers.txt").then(response => response.text()).then(data => {
            this.primeNumbers = data.split(/\s+/);
        })

    }

    basicEncrypt(){
        let e = document.getElementById("basic_encrypt_e").valueOf().value;
        let m = document.getElementById("basic_encrypt_m").valueOf().value;
        let message = document.getElementById("basic_encrypt_encrypted_message_in").valueOf().value;

        document.getElementById("basic_encrypt_encrypted_message_out").valueOf().value = this.mod(message**e,m);
    }

    basicDecrypt(){
        let d = document.getElementById("basic_decrypt_d").valueOf().value;
        let m = document.getElementById("basic_decrypt_m").valueOf().value;
        let message = document.getElementById("basic_decrypt_encrypted_message_in").valueOf().value;

        document.getElementById("basic_decrypt_encrypted_message_out").valueOf().value = this.mod(message**d,m);
    }

    breakRSA(){
        let n = document.getElementById("breaking_rsa_n").valueOf().value;


        let primeFactors = this.getPrimeFactors(n);
        document.getElementById("breaking_rsa_prime_factor_1").valueOf().value = primeFactors[0];
        document.getElementById("breaking_rsa_prime_factor_2").valueOf().value = primeFactors[1];

        let Phi =  (primeFactors[0] - 1) * (primeFactors[1] - 1);
        document.getElementById("breaking_rsa_decoded_n").valueOf().value = Phi;

        let e = document.getElementById("breaking_rsa_public_exponent").valueOf().value;

        let d;
        let c = BigInt(document.getElementById("breaking_rsa_decoded_c").valueOf().value);

        this.mod_invert(Phi,e).then(outcome => {
            let response = JSON.parse(outcome);
            console.log(response)
            d = outcome;

            document.getElementById("breaking_rsa_decoded_d").valueOf().value = d;

            let m = bigInt(c).modPow(d,n);
            let mConfirmation  = bigInt(m).modPow(e,n);
            console.log("Confirmation M Reencoded"+mConfirmation);
            document.getElementById("breaking_rsa_decoded_cipher_confirmation_output").valueOf().value = mConfirmation;

            console.log(m);
            document.getElementById("breaking_rsa_decoded_cipher_output").valueOf().value = m;

            //console.log("meesage test = "+this.mod(m**e,n))
        });

    }


    mod(input, modulas){
        let output = input/modulas;
        let wholeDivision = Math.trunc(output);
        return input - (modulas * wholeDivision);
    }


    //Method based on stack overflow response by Alan Judi
    //https://stackoverflow.com/questions/39899072/how-can-i-find-the-prime-factors-of-an-integer-in-javascript
    getPrimeFactors(n){
        let factors = [];
        let divisor = 2;

        while(n>=2){
            if(n % divisor === 0){
                factors.push(divisor);
                n= n/ divisor;
            }
            else{
                divisor++;
            }
        }
        return factors;
    }

    mod_invert(number, modulo){
        return fetch(this.domain+this.domainLocation+"mod_invert.php?modulo="+modulo+"&number="+number,{
            method: 'get',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        }).then(async function (response) {
            return await response.text();
        }).then(outcome => {
            let response = JSON.parse(outcome);
            return response.output;
        })
    }

    
}