<!DOCTYPE html>

<html lang="en">

<head>

    <style type="text/css">

html,
body {
  background: rgb(22, 22, 22);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
 	font-family: monospace;
	 font-size: 15px;
	 font-style: normal;
	 font-variant: normal;
	 font-weight: 400;
	 line-height: 11px;
	 letter-spacing: 1.5px;
   cursor: context-menu;
   -webkit-user-select: none;
	 -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
}

a {
  text-decoration: none;
}

.wrap {
  top: 45%;
  left: 45%;
  width: 400px;
  height: 200px;
  margin-left: -200px;
  margin-top: -100px;
  position: absolute;
}

.highLight {
    display:inline-block;
}

.highLight div {
    display:inline-block;
    color: white;
    overflow:hidden;
    white-space: nowrap;
    border-right: 1px solid white;
    width: 0;
    opacity: 0;
}

@-webkit-keyframes typing {
    from { width: 0; }
    to { width:100%; }
}

@-moz-keyframes typing {
    from { width: 0; }
    to { width:100%; }
}

@-webkit-keyframes blink {
    from, to { border-color: transparent }
    50% { border-color: white }
}

@-moz-keyframes blink {
    from, to { border-color: transparent }
    50% { border-color: white }
}

.variable {
  color: #616161;
}
.variable2 {
  color: #607d8b;
}
.keyword {
  color: #6d4c41;
}
.constant {
  color: #9e9e9e;
}
.docComment {
 	color: #0d47a1;
}
.operator {
  color: #ff8a65;
}
.comment {
  color: #33691e;
}
.string {
  color: #f39c12;
}

    </style>

</head>

<body>

  <div class="wrap">
    <div class="404">
      <pre><div class="highLight"><div data-line="1"><span class="keyword">function</span> setError(<span class="variable">$errorcode</span>) {</div></div>
  <div class="highLight"><div data-line="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="variable">$this</span><span class="operator">-></span><span class="variable2">errorcode</span> = <span class="variable">$errorcode;</span></div></div>
  <div class="highLight"><div data-line="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="variable">$this</span><span class="operator">-></span><span class="variable2">error</span> = <span class="variable">$this</span><span class="operator">-></span><span class="variable2">errors[<span class="string">$errorcode</span>];</span></div></div>
  <div class="highLight"><div data-line="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;}</div></div>
  <div class="highLight"><div data-line="1">}</div></div>
  <div class="highLight"><div data-line="1"><span class="keyword">function</span> getError(<span class="variable">$errormessage</span> = <span class="string">''</span>) {</div></div>
  <div class="highLight"><div data-line="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="variable">$error</span> = <span class="variable">$this</span><span class="operator">-></span><span class="variable2">errorcode</span>.<span class="variable">$this</span><span class="operator">-></span><span class="variable2">errormessage;</span></div></div>
  <div class="highLight"><div data-line="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="keyword">return</span> <span class="variable">$this</span><span class="operator">-></span><span class="variable2">$error;</span></div></div>
  <div class="highLight"><div data-line="2">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span class="keyword">exit;</span></div></div>
  <div class="highLight"><div data-line="1">}&emsp;</div></div><br />
  <div class="highLight"><div data-line="1"><span class="comment">/**</span></div></div>
  <div class="highLight"><div data-line="1"><span class="comment">&nbsp;* <span class="docComment">@link</span> <a href="/" target="_blank">AnimeCult'</a></span>&emsp;</div></div>
  <div class="highLight"><div data-line="1"><span class="comment">&nbsp;* <span class="docComment">@todo</span> ...Écrire une page 404 qui a vraiment du sens.</span></div></div>
  <div class="highLight"><div data-line="1"><span class="comment">&nbsp;*/</span></div></div>
  <div class="highLight"><div data-line="2"><span class="variable">$err</span><span class="operator">-></span><span class="variable2">setError</span>(<span class="constant">404</span>);</div></div>
  <div class="highLight"><div data-line="2"><span class="variable">$err</span><span class="operator">-></span><span class="variable2">getError</span>(<span class="string">"Page non trouvé"</span>);</div></div>
  </pre>
    </div>
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>

var delay = 0;
var lines = $(".highLight div").length;
var line = 0;
$(".highLight div").each(function(){
   var count = $(this).text().length;
   var duration = count / 12;
   $(this).css({
    "-webkit-animation" : "typing " + duration + "s steps(" + count + ", end) forwards, blink 1s step-end 1s infinite",
    "-moz-animation" : "typing " + duration + "s steps(" + count + ", end) forwards, blink 1s step-end 1s infinite",
    "animation-delay" : delay + "s"});
   var that = $(this);
   setTimeout(function(){
       that.css('opacity', '1');
   },delay*1000);
   delay += duration;
   line += 1;
   if(line != lines)
   {
       setTimeout(function(){
           that.css('border-right', '0');
       },delay*1000);
   }
});


</script>

</html>