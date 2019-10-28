# -*- coding: utf-8 -*-

class Player:
    def __init__(self, name):
        self.name = name
        self.points = 0

    def pointWon(self):
        self.points+=1;

class TennisGame1:

    def __init__(self, player_one_name, player_two_name):
        self.player_one = Player(player_one_name)
        self.player_two = Player(player_two_name)

    def get_game_score(self):
        current_game_score = ""
        temp_player_points=0
        points_for_advantage_or_win = 4
        if self.player_one.points==self.player_two.points:
            current_game_score = {
                0 : "Love-All",
                1 : "Fifteen-All",
                2 : "Thirty-All",
                3 : "Forty-All",
            }.get(self.player_one.points, "Deuce")
        elif self.player_one.points >= points_for_advantage_or_win or self.player_two.points >= points_for_advantage_or_win:
            points_difference = self.player_one.points - self.player_two.points
            points_difference_for_player_one_win = 2
            # player one
            points_advantage_player_one = 1
            poins_advantage_player_two = -1
            if points_difference== points_advantage_player_one:
                current_game_score ="Advantage " + self.player_one.name
            #player two
            elif points_difference == poins_advantage_player_two:
                current_game_score ="Advantage " + self.player_two.name
            #player one
            elif points_difference>= points_difference_for_player_one_win:
                current_game_score = "Win for " + self.player_one.name
            #player two
            else:
                current_game_score ="Win for " + self.player_two.name
        else:
            # TODO: Give a better name to the variable
            minimum_points_before_advantage = 1
            maximum_points_before_advantage = 3
            for points_before_advantage in range(minimum_points_before_advantage, maximum_points_before_advantage):
                if (points_before_advantage==1):
                    temp_player_points = self.player_one.points
                else:
                    current_game_score+="-"
                    temp_player_points = self.player_two.points
                current_game_score += {
                    0 : "Love",
                    1 : "Fifteen",
                    2 : "Thirty",
                    3 : "Forty",
                }[temp_player_points]
        return current_game_score


class TennisGame2:
    def __init__(self, player1Name, player2Name):
        self.player1Name = player1Name
        self.player2Name = player2Name
        self.p1points = 0
        self.p2points = 0
        
    def increment_point_counter(self, playerName):
        if playerName == self.player1Name:
            self.P1Score()
        else:
            self.P2Score()
    
    def score(self):
        result = ""
        if (self.p1points == self.p2points and self.p1points < 4):
            if (self.p1points==0):
                result = "Love"
            if (self.p1points==1):
                result = "Fifteen"
            if (self.p1points==2):
                result = "Thirty"
            if (self.p1points==3):
                result = "Forty"
            result += "-All"
        if (self.p1points==self.p2points and self.p1points>3):
            result = "Deuce"
        
        P1res = ""
        P2res = ""
        if (self.p1points > 0 and self.p2points==0):
            if (self.p1points==1):
                P1res = "Fifteen"
            if (self.p1points==2):
                P1res = "Thirty"
            if (self.p1points==3):
                P1res = "Forty"
            
            P2res = "Love"
            result = P1res + "-" + P2res
        if (self.p2points > 0 and self.p1points==0):
            if (self.p2points==1):
                P2res = "Fifteen"
            if (self.p2points==2):
                P2res = "Thirty"
            if (self.p2points==3):
                P2res = "Forty"
            
            P1res = "Love"
            result = P1res + "-" + P2res
        
        
        if (self.p1points>self.p2points and self.p1points < 4):
            if (self.p1points==2):
                P1res="Thirty"
            if (self.p1points==3):
                P1res="Forty"
            if (self.p2points==1):
                P2res="Fifteen"
            if (self.p2points==2):
                P2res="Thirty"
            result = P1res + "-" + P2res
        if (self.p2points>self.p1points and self.p2points < 4):
            if (self.p2points==2):
                P2res="Thirty"
            if (self.p2points==3):
                P2res="Forty"
            if (self.p1points==1):
                P1res="Fifteen"
            if (self.p1points==2):
                P1res="Thirty"
            result = P1res + "-" + P2res
        
        if (self.p1points > self.p2points and self.p2points >= 3):
            result = "Advantage " + self.player1Name
        
        if (self.p2points > self.p1points and self.p1points >= 3):
            result = "Advantage " + self.player2Name

        if (self.p1points>=4 and self.p2points>=0 and (self.p1points-self.p2points)>=2):
            result = "Win for " + self.player1Name
        if (self.p2points>=4 and self.p1points>=0 and (self.p2points-self.p1points)>=2):
            result = "Win for " + self.player2Name
        return result
    
    def SetP1Score(self, number):
        for i in range(number):
            self.P1Score()
    
    def SetP2Score(self, number):
        for i in range(number):
            self.P2Score()
    
    def P1Score(self):
        self.p1points +=1
    
    
    def P2Score(self):
        self.p2points +=1
        
class TennisGame3:
    def __init__(self, player1Name, player2Name):
        self.p1N = player1Name
        self.p2N = player2Name
        self.p1 = 0
        self.p2 = 0
        
    def increment_point_counter_for_player(self, n):
        if n == self.p1N:
            self.p1 += 1
        else:
            self.p2 += 1
    
    def score(self):
        if (self.p1 < 4 and self.p2 < 4):
            p = ["Love", "Fifteen", "Thirty", "Forty"]
            s = p[self.p1]
            return s + "-All" if (self.p1 == self.p2) else s + "-" + p[self.p2]
        else:
            if (self.p1 == self.p2):
                return "Deuce"
            s = self.p1N if self.p1 > self.p2 else self.p2N
            return "Advantage " + s if ((self.p1-self.p2)*(self.p1-self.p2) == 1) else "Win for " + s
