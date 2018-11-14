using System;
using System.Collections.Generic;
using System.Linq;

public class PointsCount
{
    public static void Main()
    {
        var playerPointsByTeam =
            new Dictionary<string, Dictionary<string, int>>();

        while (true)
        {
            var inputLine = Console.ReadLine();

            if (inputLine == "Result")
            {
                break;
            }

            var tokens = inputLine.Split('|');

            DeleteProhibitedSymbols(tokens);

            var team = tokens[0];
            var player = tokens[1];
            var points = int.Parse(tokens[2]);

            if (team != team.ToUpper())
            {
                var temp = team;
                team = player;
                player = temp;
            }

            if (!playerPointsByTeam.ContainsKey(team))
            {
                playerPointsByTeam[team] = new Dictionary<string, int>();
            }

            if (!playerPointsByTeam[team].ContainsKey(player))
            {
                playerPointsByTeam[team][player] = 0;
            }

            playerPointsByTeam[team][player] = points;
        }

        playerPointsByTeam = playerPointsByTeam
            .OrderByDescending(a => a.Value.Values.Sum())
            .ToDictionary(a => a.Key, a => a.Value);

        foreach (var team in playerPointsByTeam)
        {
            var teamName = team.Key;
            var teamScore = team.Value.Values.Sum();
            var bestPlayerScore = team.Value.Values.Max();
            var bestPlayer = string.Empty;

            foreach (var playerPoints in team.Value)
            {
                var playerName = playerPoints.Key;
                var playerScore = playerPoints.Value;

                if (playerScore == bestPlayerScore)
                {
                    bestPlayer = playerName;
                    break;
                }
            }

            Console.WriteLine($"{teamName} => {teamScore}");
            Console.WriteLine($"Most points scored by {bestPlayer}");
        }
    }

    public static void DeleteProhibitedSymbols(string[] tokens)
    {
        for (var i = 0; i < tokens.Length - 1; i++)
        {
            var playerOrTeamName = tokens[i];

            var arr = playerOrTeamName
                .ToCharArray()
                .Where(a => a != '@' && a != '%' && a != '$' && a != '*');
            var clearedName = string.Join(string.Empty, arr);

            tokens[i] = clearedName;
        }
    }
}