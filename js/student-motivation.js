function loadMotivationQuote(){
    const motivationsDict = {
        "Nelson Mandela": "It always seems impossible until it’s done.",
        "Thomas Jefferson": "The more I work, the more luck I seem to have.",
        "Martin Luther King" : "Your talents and abilities will improve over time, but for that you have to start.",
        "Jean Jacques Rousseau" : "Youth is the time to study wisdom; the old age, that of practicing it.",
        "Arnold Palmer" : "Use all your efforts, even when the possibilities play against you."
    };
    
    let keys = Object.keys(motivationsDict);
    let index = keys.length * Math.random() << 0;
    let pickedKey = motivationsDict[keys[index]];
    
    document.getElementById("motivation").innerHTML = pickedKey;
    document.getElementById("motivation-footer").innerHTML = keys[index]; 
}