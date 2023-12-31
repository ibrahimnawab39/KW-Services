//  copyright lexilogos.com
var car;

function transcrire() {
car = document.conversion.saisie.value;
car = car.replace(/’/g, "\'");
car = car.replace(/h/g, "-");
car = car.replace(/a/g, "α");
car = car.replace(/α'/g, "ά");
car = car.replace(/[áàâä]/g, "ά");
car = car.replace(/b/g, "β");
car = car.replace(/c/g, "κ");
car = car.replace(/κ-/g, "χ");
car = car.replace(/d/g, "δ");
car = car.replace(/e/g, "ε");
car = car.replace(/é/g, "έ");
car = car.replace(/ε'/g, "έ");
car = car.replace(/f/g, "φ");
car = car.replace(/π-/g, "φ");
car = car.replace(/g/g, "γ");
car = car.replace(/[èêēëj]/g, "η");
car = car.replace(/η'/g, "ή");
car = car.replace(/i/g, "ι");
car = car.replace(/[íî]/g, "ί");
car = car.replace(/ι'/g, "ί");
car = car.replace(/x/g, "ξ");
car = car.replace(/k/g, "κ");
car = car.replace(/l/g, "λ");
car = car.replace(/m/g, "μ");
car = car.replace(/n/g, "ν");
car = car.replace(/o/g, "ο");
car = car.replace(/ó/g, "ό");
car = car.replace(/ο'/g, "ό");
car = car.replace(/p/g, "π");
car = car.replace(/r/g, "ρ");
car = car.replace(/s/g, "σ");
car = car.replace(/t/g, "τ");
car = car.replace(/u/g, "υ");
car = car.replace(/[úùû]/g, "ύ");
car = car.replace(/υ'/g, "ύ");
car = car.replace(/[wōôö]/g, "ω");
car = car.replace(/ω'/g, "ώ");
car = car.replace(/ï/g, "ϊ");
car = car.replace(/ü/g, "ϋ");
car = car.replace(/ϋ'/g, "ΰ");
car = car.replace(/z/g, "ζ");
car = car.replace(/v/g, "υ");
car = car.replace(/y/g, "υ");
car = car.replace(/τ-/g, "θ");
car = car.replace(/πσ/g, "ψ");
car = car.replace(/ç/g, "ς");

car = car.replace(/H/g, "-");
car = car.replace(/A/g, "Α");
car = car.replace(/[ÁÀÂÄ]/g, "Ά");
car = car.replace(/Α'/g, "Ά");
car = car.replace(/B/g, "Β");
car = car.replace(/C/g, "Κ");
car = car.replace(/Κ-/g, "Χ");
car = car.replace(/D/g, "Δ");
car = car.replace(/E/g, "Ε");
car = car.replace(/Ε'/g, "Έ");
car = car.replace(/É/g, "Έ");
car = car.replace(/F/g, "Φ");
car = car.replace(/Π-/g, "Φ");
car = car.replace(/G/g, "Γ");
car = car.replace(/[ÈÊĒËJ]/g, "Η");
car = car.replace(/Η'/g, "Ή");
car = car.replace(/I/g, "Ι");
car = car.replace(/[ÍÎ]/g, "Ί");
car = car.replace(/Ï/g, "Ϊ");
car = car.replace(/Ι'/g, "Ί");
car = car.replace(/X/g, "Ξ");
car = car.replace(/K/g, "Κ");
car = car.replace(/L/g, "Λ");
car = car.replace(/M/g, "Μ");
car = car.replace(/N/g, "Ν");
car = car.replace(/O/g, "Ο");
car = car.replace(/Ó/g, "Ό");
car = car.replace(/Ο'/g, "Ό");
car = car.replace(/P/g, "Π");
car = car.replace(/R/g, "Ρ");
car = car.replace(/S/g, "Σ");
car = car.replace(/T/g, "Τ");
car = car.replace(/U/g, "Υ");
car = car.replace(/[ÚÙÛ]/g, "Ύ");
car = car.replace(/Υ'/g, "Ύ");
car = car.replace(/Ü/g, "Ϋ");
car = car.replace(/[WŌÔÖ]/g, "Ω");
car = car.replace(/Ω'/g, "Ώ");
car = car.replace(/Z/g, "Ζ");
car = car.replace(/Τ-/g, "Θ");
car = car.replace(/Πσ/g, "Ψ");
car = car.replace(/ΠΣ/g, "Ψ");
car = car.replace(/Y/g, "Υ");
car = car.replace(/V/g, "Υ");
car = car.replace(/σ /g, "ς ");
car = car.replace(/σ,/g, "ς,");
car = car.replace(/σ;/g, "ς;");
car = car.replace(/σ:/g, "ς:");
car = car.replace(/σ!/g, "ς!");
car = car.replace(/σ\./g, "ς\.");
car = car.replace(/\?/g, "\;");

startPos = document.conversion.saisie.selectionStart;
endPos = document.conversion.saisie.selectionEnd;

beforeLen = document.conversion.saisie.value.length;
afterLen = car.length;
adjustment = afterLen - beforeLen;

document.conversion.saisie.value = car;

document.conversion.saisie.selectionStart = startPos + adjustment;
document.conversion.saisie.selectionEnd = endPos + adjustment;

var obj = document.conversion.saisie;
obj.focus();
obj.scrollTop = obj.scrollHeight;
}