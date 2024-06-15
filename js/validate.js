function validate(form) {
    let fail = validateName(form.name.value)
    fail += validateEmail(form.email.value)
    fail += validateMessage(form.message.value)
    
    if (fail == "") return true
    else { alert(fail); return false }
}

function validateName(field) {
    return (field == "") ? "No name was entered.\n" : ""
}

function validateEmail(field) {
    if (field == "") return "No email was entered.\n"
    else if (!/\S+@\S+\.\S+/.test(field))
        return "The email address is invalid.\n"
    return ""
}

function validateMessage(field) {
    return (field == "") ? "No message was entered.\n" : ""
}