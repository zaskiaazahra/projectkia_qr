const { createApp } = Vue;

createApp({

    data(){

        return{

            type:"Email",
            data:"",
            subject:"",
            message:"",
            time:"",
            date:""

        }
    },

    mounted(){

        this.updateClock();

        setInterval(
            this.updateClock,
            1000
        );
    },

    methods:{

        updateClock(){

            let now =
            new Date();

            this.time =
            now.toLocaleTimeString();

            this.date =
            now.toDateString();

        },

        generateQR(){

            document
            .getElementById(
                "qrcode"
            )
            .innerHTML = "";

            let finalData =
            this.data;

            if(
                this.type
                ===
                "Email"
            ){

                finalData =
                "mailto:"
                +
                this.data
                +
                "?subject="
                +
                encodeURIComponent(
                    this.subject
                )
                +
                "&body="
                +
                encodeURIComponent(
                    this.message
                );
            }

            if(
                this.type
                ===
                "URL"
            ){

                finalData =
                this.data;
            }

            if(
                this.type
                ===
                "Text"
            ){

                finalData =
                this.data
                +
                "\n"
                +
                this.subject
                +
                "\n"
                +
                this.message;
            }

            if(
                this.type
                ===
                "WhatsApp"
            ){

                finalData =
                "https://wa.me/"
                +
                this.data
                +
                "?text="
                +
                encodeURIComponent(
                    this.message
                );
            }

            if(
                this.type
                ===
                "Payment"
            ){

                finalData =
                "PAYMENT INFORMATION"
                +
                "\nNomor/Rekening: "
                +
                this.data
                +
                "\nSubject: "
                +
                this.subject
                +
                "\nMessage: "
                +
                this.message;
            }

            new QRCode(

                document
                .getElementById(
                    "qrcode"
                ),

                {
                    text:
                    finalData,

                    width:220,
                    height:220,

                    correctLevel:
                    QRCode.CorrectLevel.H
                }
            );

            fetch(
                "save.php",
                {
                    method:"POST",

                    headers:{
                        "Content-Type":
                        "application/x-www-form-urlencoded"
                    },

                    body:
                    "type="
                    +
                    encodeURIComponent(
                        this.type
                    )
                    +
                    "&data="
                    +
                    encodeURIComponent(
                        finalData
                    )
                }
            );
        },

        downloadQR(){

            let img =
            document.querySelector(
                "#qrcode img"
            );

            if(img){

                let a =
                document.createElement(
                    "a"
                );

                a.href =
                img.src;

                a.download =
                "qrcode.png";

                a.click();
            }
        }

    }

}).mount("#app");