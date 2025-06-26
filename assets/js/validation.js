const validation = new JustValidate("#Yukon_SignUp");

validation 
        .addField("#name", [
    {
        rule: "requiered"
    }
        ])
        
        .addField("#email", [
    {
        rule:"required"
    },
    {
        rule: "email"
    },
    {
        validator: (value) => () => {
            return fetch ("validate-email.php?email="+ encodeURIComponent(value))
                    .then(function(response){
                        return response.json();
            })
                    .then(function(json)
            {
                return json.available;
            });
        }, 
        errorMessage: "Email already taken"
    }
        ])
                .addField ("#password", [
            {
                rule: "requiered"
            },
            {
                rule: "password"
            }
                ])
                        .addField("#password_confirmation", [
                    {
                        validator: (value, fields) => {
                            return value === fields["#password"].elem.value;
                        },
                        errorMessage: "Passwords should match"
                    }
                        ])
                                .onSuccess((event) => {
                                    document.getElementById("signup").submit();
                        });