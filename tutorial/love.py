import math
import turtle
import colorsys

def heart_x(t):
    return 16 * math.sin(t) ** 3

def heart_y(t):
    return (
        13 * math.cos(t)
        - 5 * math.cos(2 * t)
        - 2 * math.cos(3 * t)
        - math.cos(4 * t)
    )

def draw_heart(size=15, speed_val=500, color_cycle=True):
    turtle.speed(speed_val)
    turtle.bgcolor("black")
    turtle.pensize(2)
    turtle.hideturtle()

    steps = 1000  

    for i in range(steps):
        t = i * 0.2  

        x = heart_x(t) * size
        y = heart_y(t) * size

        if color_cycle:
            h = i / steps
            r, g, b = colorsys.hsv_to_rgb(h, 1, 1)
            turtle.color(r, g, b)
        else:
            turtle.color("red")

        turtle.goto(x, y)
        turtle.dot(6)  

    turtle.goto(0, 0)
    turtle.done()

draw_heart(size=15, speed_val=500, color_cycle=True)
