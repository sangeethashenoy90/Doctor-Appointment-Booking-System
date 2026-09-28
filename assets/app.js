/* Raagha Clinic — shared front-end behaviour
   Vanilla JS replacement for the old Bootstrap/jQuery tab & nav plumbing. */

/* ---- role tabs on the register/login landing page (index.php) ---- */
function showRole(role){
  document.querySelectorAll('.role-tabs button').forEach(function(b){
    b.classList.toggle('active', b.dataset.role === role);
  });
  document.querySelectorAll('.role-panel').forEach(function(p){
    p.classList.toggle('active', p.dataset.role === role);
  });
}

/* ---- generic sidebar/dashboard tab system ---- */
function showTab(name){
  document.querySelectorAll('[data-tab]').forEach(function(l){
    l.classList.toggle('active', l.dataset.tab === name);
  });
  document.querySelectorAll('[data-tab-panel]').forEach(function(p){
    p.classList.toggle('active', p.dataset.tabPanel === name);
  });
}
document.addEventListener('click', function(e){
  var trigger = e.target.closest('[data-tab], [data-tab-goto]');
  if(!trigger) return;
  e.preventDefault();
  showTab(trigger.dataset.tab || trigger.dataset.tabGoto);
});

/* ---- password match / validation helpers (reused across pages) ---- */
function checkPasswordMatch(pwId, cpwId, msgId){
  var pw = document.getElementById(pwId), cpw = document.getElementById(cpwId), msg = document.getElementById(msgId);
  if(!pw || !cpw || !msg) return;
  if(pw.value === cpw.value){
    msg.style.color = '#1F4B3F';
    msg.innerHTML = 'Matched';
  } else {
    msg.style.color = '#B3402A';
    msg.innerHTML = 'Not matching';
  }
}
function checkPasswordLength(pwId, minLen){
  var pw = document.getElementById(pwId);
  if(pw && pw.value.length < (minLen || 6)){
    alert('Password must be at least ' + (minLen || 6) + ' characters long. Try again!');
    return false;
  }
  return true;
}
function alphaOnly(event){
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
}

/* ---- doctor specialization filter + fee autofill (admin-panel.php) ---- */
function initSpecFilter(){
  var specEl = document.getElementById('spec');
  var docEl = document.getElementById('doctor');
  var feesEl = document.getElementById('docFees');
  if(specEl && docEl){
    specEl.addEventListener('change', function(){
      var spec = this.value;
      Array.prototype.forEach.call(docEl.options, function(opt){
        opt.style.display = (!opt.dataset.spec || opt.dataset.spec === spec) ? '' : 'none';
      });
    });
  }
  if(docEl && feesEl){
    docEl.addEventListener('change', function(){
      var opt = docEl.options[docEl.selectedIndex];
      feesEl.value = opt ? (opt.dataset.value || '') : '';
    });
  }
}
document.addEventListener('DOMContentLoaded', initSpecFilter);

/* ---- mobile sidebar / nav toggle ---- */
document.addEventListener('DOMContentLoaded', function(){
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('.top-nav nav');
  if(toggle && nav){
    toggle.addEventListener('click', function(){ nav.classList.toggle('open'); });
  }
  var sideToggle = document.querySelector('.side-toggle');
  var shell = document.querySelector('.app-shell');
  if(sideToggle && shell){
    sideToggle.addEventListener('click', function(){ shell.classList.toggle('sidebar-open'); });
  }
});


