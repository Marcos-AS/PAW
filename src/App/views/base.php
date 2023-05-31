<!DOCTYPE html>
<html>
<head>
    {% block head %}
        <meta charset="utf-8">
        <title>{% block title %}{% endblock %} - PAW 2023</title>
        <link rel="stylesheet" href="/assets/css/global.css">
    {% endblock %}
</head>
<body>
    <header>
        {% block header %}
            {% include 'parts/header.view.php' %}    
        {% endblock %}
    </header>
    <nav>
        {% block nav %}
            {% include 'parts/nav.view.php' %}    
        {% endblock %}
    </nav>
    <footer>
        {% block footer %}
            {% include 'parts/footer.view.php' %}
        {% endblock %}
    </footer>
</body>
</html>